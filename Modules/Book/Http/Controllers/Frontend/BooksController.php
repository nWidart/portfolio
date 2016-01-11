<?php namespace Modules\Book\Http\Controllers\Frontend;

use Illuminate\Routing\Controller;
use Modules\Book\Repositories\BookRepository;

class BooksController extends Controller
{
    /**
     * @var BookRepository
     */
    private $book;

    public function __construct(BookRepository $book)
    {
        $this->book = $book;
    }

    public function index()
    {
        $read = $this->book->allHaveRead();
        $reading = $this->book->allCurrentlyReading();
        $toRead = $this->book->allGoingToRead();

        return view('book::public.books', compact('read', 'reading', 'toRead'));
    }
}
