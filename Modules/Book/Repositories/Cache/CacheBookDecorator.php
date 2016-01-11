<?php namespace Modules\Book\Repositories\Cache;

use Modules\Book\Repositories\BookRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheBookDecorator extends BaseCacheDecorator implements BookRepository
{
    public function __construct(BookRepository $book)
    {
        parent::__construct();
        $this->entityName = 'book.books';
        $this->repository = $book;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allGoingToRead()
    {
        return $this->cache
            ->tags($this->entityName, 'global')
            ->rememberForever("{$this->locale}.{$this->entityName}.allGoingToRead",
                function () {
                    return $this->repository->allGoingToRead();
                }
            );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allHaveRead()
    {
        return $this->cache
            ->tags($this->entityName, 'global')
            ->rememberForever("{$this->locale}.{$this->entityName}.allHaveRead",
                function () {
                    return $this->repository->allHaveRead();
                }
            );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allCurrentlyReading()
    {
        return $this->cache
            ->tags($this->entityName, 'global')
            ->rememberForever("{$this->locale}.{$this->entityName}.allCurrentlyReading",
                function () {
                    return $this->repository->allCurrentlyReading();
                }
            );
    }
}
