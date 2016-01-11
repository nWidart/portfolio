<?php namespace Modules\Activity\Services\Activity\Github\Events;

interface GithubEventInterface
{
    public function handle($eventData);
}
