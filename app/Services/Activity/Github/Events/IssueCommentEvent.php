<?php namespace Nwidart\Services\Activity\Github\Events;

class IssueCommentEvent extends BaseEventClass implements GithubEventInterface
{
    public function handle($eventData)
    {
        return [
            'time' => $this->getDate($eventData['created_at']),
            'actor' => $eventData['actor']['login'],
            'actor_avatar' => $eventData['actor']['avatar_url'],
            'verb' => 'commented on ',
            'action_object' => $eventData['repo']['name'],
            'target' => $eventData['payload']['comment']['html_url']
        ];
    }
}