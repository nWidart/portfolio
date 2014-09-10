<?php namespace Nwidart\Services\Activity\Github\Events;

use Carbon\Carbon;

abstract class BaseEventClass
{
    public function getDate($date)
    {
        $date = strtotime($date);

        return Carbon::createFromTimestamp($date)->diffForHumans();
    }
}