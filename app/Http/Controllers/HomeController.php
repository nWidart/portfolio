<?php namespace Nwidart\Http\Controllers;

use Illuminate\Routing\Controller;
use Nwidart\Posts\Repositories\PostRepository;

class HomeController extends Controller
{
    public function index(PostRepository $post)
    {
        $posts = $post->latest();

        return view('hello', compact('posts'));
    }
}
