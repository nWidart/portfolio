<?php namespace Nwidart\Http\Controllers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Routing\Controller;

class BookController extends Controller
{
    public function index(Filesystem $finder)
    {
        $books = json_decode($finder->get(base_path() . '/data/books/books.json'));

        $reading = $books->reading;
        $read = $books->read;
        $toRead = $books->toRead;

        return view('pages.book-library', compact('reading', 'read', 'toRead'));
    }
}
