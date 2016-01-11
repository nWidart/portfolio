<?php namespace Modules\Book\Repositories\Eloquent;

use Modules\Book\Repositories\BookRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentBookRepository extends EloquentBaseRepository implements BookRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allGoingToRead()
    {
        return $this->model->where('status_id', 2)->orderBy('created_at', 'desc')->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allHaveRead()
    {
        return $this->model->where('status_id', 1)->orderBy('created_at', 'desc')->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allCurrentlyReading()
    {
        return $this->model->where('status_id', 3)->orderBy('created_at', 'desc')->get();
    }
}
