<?php namespace Modules\Activity\Services\Activity\Github;

use Modules\Activity\Services\Activity\EventFactoryInterface;

class GithubEventFactory implements EventFactoryInterface
{
    public function make($eventType)
    {
        $class = "Modules\Activity\\Services\\Activity\\Github\\Events\\$eventType";

        return new $class;
    }
}
