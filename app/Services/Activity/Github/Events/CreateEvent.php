<?php namespace Nwidart\Services\Activity\Github\Events;

class CreateEvent extends BaseEventClass implements GithubEventInterface
{
    public function handle($eventData)
    {
        return [
            'time' => $this->getDate($eventData['created_at']),
            'actor' => $eventData['actor']['login'],
            'actor_avatar' => $eventData['actor']['avatar_url'],
            'verb' => "created {$eventData['payload']['ref_type']}",
            'action_object' => $eventData['payload']['ref'],
            'target' => "http://github.com/{$eventData['repo']['name']}"
        ];
    }
}