<?php namespace Modules\Activity\Services\Activity;

interface EventFactoryInterface
{
    public function make($eventType);
}
