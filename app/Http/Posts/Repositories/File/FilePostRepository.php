<?php namespace Nwidart\Http\Posts\Repositories\File;

use Nwidart\Http\Posts\Entities\Post;
use Nwidart\Http\Posts\Repositories\PostRepository;

class FilePostRepository implements PostRepository
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function all()
    {
        return $this->post->all();
    }

    public function findBySlug($slug)
    {
        return $this->post->findBySlug($slug);
    }
}