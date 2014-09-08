<?php namespace Nwidart\Posts\Repositories;

interface PostRepository
{
    /**
     * Return all the blog posts
     *
     * @return mixed
     */
    public function all();

    /**
     * Find a blog post by its slug
     *
     * @param $string
     * @return mixed
     */
    public function findBySlug($string);

    /**
     * Find the latest blog posts
     * @param int $amount
     * @return mixed
     */
    public function latest($amount = 5);
}