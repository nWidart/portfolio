<?php namespace Nwidart\Posts\Repositories\File;

use Nwidart\Posts\Entities\Post;
use Nwidart\Posts\Repositories\PostRepository;

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

    /**
     * Find the latest blog posts
     * @param int $amount
     * @return mixed
     */
    public function latest($amount = 5)
    {
        return $this->post->latest($amount);
    }
}