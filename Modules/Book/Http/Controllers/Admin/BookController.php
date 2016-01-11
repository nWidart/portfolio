<?php namespace Modules\Book\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Book\Entities\Book;
use Modules\Book\Repositories\BookRepository;
use Modules\Book\Repositories\StatusRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Media\Repositories\FileRepository;

class BookController extends AdminBaseController
{
    /**
     * @var BookRepository
     */
    private $book;
    /**
     * @var StatusRepository
     */
    private $status;

    public function __construct(BookRepository $book, StatusRepository $status)
    {
        parent::__construct();

        $this->book = $book;
        $this->status = $status;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $books = $this->book->all();

        return view('book::admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $statuses = $this->status->all();

        return view('book::admin.books.create', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->book->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('book::books.title.books')]));

        return redirect()->route('admin.book.book.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Book $book
     * @return Response
     */
    public function edit(Book $book, FileRepository $fileRepository)
    {
        $bookcover = $fileRepository->findFileByZoneForEntity('image', $book);
        $statuses = $this->status->all();

        return view('book::admin.books.edit', compact('book', 'statuses', 'bookcover'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Book $book
     * @param  Request $request
     * @return Response
     */
    public function update(Book $book, Request $request)
    {
        $this->book->update($book, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('book::books.title.books')]));

        return redirect()->route('admin.book.book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Book $book
     * @return Response
     */
    public function destroy(Book $book)
    {
        $this->book->destroy($book);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('book::books.title.books')]));

        return redirect()->route('admin.book.book.index');
    }
}
