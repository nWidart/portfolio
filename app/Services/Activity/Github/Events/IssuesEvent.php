<?php namespace Nwidart\Services\Activity\Github\Events;


class IssuesEvent extends BaseEventClass implements GithubEventInterface
{
    public function handle($eventData)
    {
        return [
            'time' => $this->getDate($eventData['created_at']),
            'actor' => $eventData['actor']['login'],
            'actor_avatar' => $eventData['actor']['avatar_url'],
            'verb' => "opened issue ",
            'action_object' => $eventData['payload']['issue']['title'],
            'target' => $eventData['payload']['issue']['html_url']
        ];
    }
}