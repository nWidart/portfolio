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
}
