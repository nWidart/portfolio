<?php namespace Nwidart\Http\Posts\Repositories;

interface PostRepository
{
    public function all();

    public function findBySlug($string);
}