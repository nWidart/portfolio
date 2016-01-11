<?php namespace Modules\Activity\Services\Activity\Github\Events;

class PullRequestEvent extends BaseEventClass implements GithubEventInterface
{
    public function handle($eventData)
    {
        return [
            'time' => $this->getDate($eventData['created_at']),
            'actor' => $eventData['actor']['login'],
            'actor_avatar' => $eventData['actor']['avatar_url'],
            'verb' => 'opened PR on ',
            'action_object' => $eventData['repo']['name'],
            'target' => $eventData['payload']['pull_request']['html_url']
        ];
    }
}
