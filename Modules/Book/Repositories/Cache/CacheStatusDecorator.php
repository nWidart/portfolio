<?php namespace Modules\Book\Repositories\Cache;

use Modules\Book\Repositories\StatusRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheStatusDecorator extends BaseCacheDecorator implements StatusRepository
{
    public function __construct(StatusRepository $status)
    {
        parent::__construct();
        $this->entityName = 'book.statuses';
        $this->repository = $status;
    }
}
