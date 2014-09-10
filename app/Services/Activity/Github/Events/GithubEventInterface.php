<?php namespace Nwidart\Services\Activity\Github\Events;

interface GithubEventInterface
{
    public function handle($eventData);
}