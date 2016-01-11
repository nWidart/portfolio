<?php namespace Modules\Activity\Services\Activity\Github\Events;

use Carbon\Carbon;

abstract class BaseEventClass
{
    public function getDate($date)
    {
        $date = strtotime($date);

        return Carbon::createFromTimestamp($date)->diffForHumans();
    }

    public function getGithubUrl($repository)
    {
        return "http://github.com/{$repository}";
    }
}
