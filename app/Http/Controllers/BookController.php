<?php namespace Nwidart\Http\Controllers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

class BookController extends Controller
{
    public function index(Filesystem $finder)
    {
        $books = $this->getBooksData($finder);

        $reading = $books->reading;
        $read = $books->read;
        $toRead = $books->toRead;

        return view('pages.book-library', compact('reading', 'read', 'toRead'));
    }

    private function getBooksData(Filesystem $finder)
    {
        if (!Cache::has('books')) {
            $books = json_decode($finder->get(base_path() . '/data/books/books.json'));
            Cache::put('books', $books, 1440);
        }

        return Cache::get('books', []);
    }
}
