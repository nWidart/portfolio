<?php namespace Nwidart\Http\Posts\Entities;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Kurenai\DocumentParser;
use stdClass;

class Post
{
    public $title;
    public $slug;
    public $status;
    public $date;
    public $tags;
    public $content;
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
        $parser = new DocumentParser;
        foreach ($this->finder->allFiles('posts') as $i => $post) {
            $post = $parser->parse($this->finder->get($post));
            $postObject = new stdClass;
            $postObject->title = $post->get('title');
            $postObject->slug = $post->get('slug');
            $postObject->status = $post->get('status');
            $postObject->date = $post->get('date');
            $postObject->tags = $post->get('tags');
            $postObject->content = $this->replaceCodeParts($post);
            $postCollection->put($i, $postObject);
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

    private function replaceCodeParts($post)
    {
        $pattern = '/(`){3}\ +(\w+)/';
        $replacement = '<pre><code class="language-$2">';
        $cleanedPost = preg_replace($pattern, $replacement, $post->getContent());
        return str_replace('```', '</code></pre>', $cleanedPost);
    }
}