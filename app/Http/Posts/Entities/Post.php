<?php namespace Nwidart\Http\Posts\Entities;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Kurenai\DocumentParser;
use Illuminate\Filesystem\Filesystem as FileSys;
use stdClass;
use Michelf\MarkdownExtra;

class Post
{
    /**
     * @var Filesystem
     */
    private $finder;
    /**
     * @var FileSys
     */
    private $fileSys;

    public function __construct(Filesystem $finder, FileSys $fileSys)
    {
        $this->finder = $finder;
        $this->fileSys = $fileSys;
    }
    public function all()
    {
        $postCollection = new Collection;
        $parser = new DocumentParser;
        foreach ($this->finder->allFiles('posts') as $i => $file) {
            if ($this->isMarkdownFile($file)) {
                $post = $parser->parse($this->finder->get($file));
                $postObject = new stdClass;
                $postObject->title = $post->get('title');
                $postObject->slug = $post->get('slug');
                $postObject->status = $post->get('status');
                $postObject->date = $post->get('date');
                $postObject->tags = $post->get('tags');
                $postObject->content = $this->replaceCodeParts($post);
                $postCollection->put($i, $postObject);
            }
        }

        $postCollection->sortByDesc(function($post) {
            return $post->date;
        });

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
        return $this->fileSys->extension($file) === 'md';
    }
}