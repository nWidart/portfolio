<?php namespace Nwidart\Http\Controllers;

use Illuminate\Routing\Controller;

class BookController extends Controller
{
    public function index()
    {
        return view('pages.book-library');
    }
}
