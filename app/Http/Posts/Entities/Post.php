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
            $postObject->content = $post->getHtmlContent();
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
}