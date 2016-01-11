<?php namespace Modules\Book\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Book\Entities\Status;
use Modules\Book\Repositories\StatusRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class StatusController extends AdminBaseController
{
    /**
     * @var StatusRepository
     */
    private $status;

    public function __construct(StatusRepository $status)
    {
        parent::__construct();

        $this->status = $status;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $statuses = $this->status->all();

        return view('book::admin.statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('book::admin.statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->status->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('book::statuses.title.statuses')]));

        return redirect()->route('admin.book.status.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Status $status
     * @return Response
     */
    public function edit(Status $status)
    {
        return view('book::admin.statuses.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Status $status
     * @param  Request $request
     * @return Response
     */
    public function update(Status $status, Request $request)
    {
        $this->status->update($status, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('book::statuses.title.statuses')]));

        return redirect()->route('admin.book.status.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Status $status
     * @return Response
     */
    public function destroy(Status $status)
    {
        $this->status->destroy($status);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('book::statuses.title.statuses')]));

        return redirect()->route('admin.book.status.index');
    }
}
