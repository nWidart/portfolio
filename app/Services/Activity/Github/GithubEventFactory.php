<?php namespace Nwidart\Services\Activity\Github;

use Nwidart\Services\Activity\EventFactoryInterface;

class GithubEventFactory implements EventFactoryInterface
{
    public function make($eventType)
    {
        $class = "Nwidart\\Services\\Activity\\Github\\Events\\$eventType";

        return new $class;
    }
}