<?php namespace Modules\Book\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface BookRepository extends BaseRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allGoingToRead();

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allHaveRead();

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allCurrentlyReading();
}
