<?php namespace Nwidart\Services\Activity;

interface EventFactoryInterface
{
    public function make($eventType);
}