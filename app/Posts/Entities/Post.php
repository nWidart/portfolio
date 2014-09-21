<?php namespace Nwidart\Posts\Entities;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Kurenai\DocumentParser;
use Illuminate\Filesystem\Filesystem;
use stdClass;
use Michelf\MarkdownExtra;

class Post
{
    /**
     * @var Filesystem
     */
    private $finder;

    public function __construct(Filesystem $finder)
    {
        $this->finder = $finder;
    }
    public function all()
    {
        $postCollection = new Collection;
        foreach ($this->finder->allFiles(__DIR__.'/../../../data/posts') as $i => $file) {
            if (!$this->isMarkdownFile($file)) {
                continue;
            }
            $post = $this->getPostContent($file);
            if ($this->isInDraft($post) && !Auth::check()) {
                continue;
            }

            $postCollection->put($i, $this->getPostData($post));
        }

        $postCollection = $this->orderByDate($postCollection);

        return $postCollection;
    }

    public function findBySlug($slug)
    {
        foreach ($this->all() as $post) {
            if ($post->slug == $slug) {
                return $post;
            }
        }

        return App::abort('404');
    }

    public function latest($amount = 5)
    {
        $posts = $this->all();

        return $posts->take($amount);
    }

    private function replaceCodeParts($post)
    {
        return MarkdownExtra::defaultTransform($post->getContent());
    }

    private function isMarkdownFile($file)
    {
        return $this->finder->extension($file) === 'md';
    }

    /**
     * @param $file
     * @return mixed
     */
    private function getPostContent($file)
    {
        $parser = new DocumentParser;
        if (!Cache::has("blog-post-{$file}")) {
            $post = $parser->parse($this->finder->get($file));
            Cache::put("blog-post-{$file}", $post, 1440);
        }
        $post = Cache::get("blog-post-{$file}");
        return $post;
    }

    private function isInDraft($post)
    {
        return $post->get('status') == 'draft' ? true : false;
    }

    private function getPostData($post)
    {
        $postObject = new stdClass;
        $postObject->title = $post->get('title');
        $postObject->slug = $post->get('slug');
        $postObject->status = $post->get('status');
        $postObject->date = $post->get('date');
        $postObject->tags = $post->get('tags');
        $postObject->content = $this->replaceCodeParts($post);
        $postObject->metaDescription = $post->get('meta-description') ?: '';

        return $postObject;
    }

    private function orderByDate($collection)
    {
        foreach ($collection as $post) {
            $timestamp = strtotime($post->date);
            $post->date = Carbon::createFromTimestamp($timestamp);
        }
        return $collection->sort(function ($post1, $post2){
                if ($post1->date->gt($post2->date)) {
                    return -1;
                }
                if ($post1->date->lt($post2->date)) {
                    return 1;
                }
                return 0;
            });
    }

}