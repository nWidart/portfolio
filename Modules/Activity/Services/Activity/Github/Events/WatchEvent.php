<?php namespace Modules\Activity\Services\Activity\Github\Events;

class WatchEvent extends BaseEventClass implements GithubEventInterface
{
    public function handle($eventData)
    {
        return [
            'time' => $this->getDate($eventData['created_at']),
            'actor' => $eventData['actor']['login'],
            'actor_avatar' => $eventData['actor']['avatar_url'],
            'verb' => 'starred ',
            'action_object' => $eventData['repo']['name'],
            'target' => $this->getGithubUrl($eventData['repo']['name'])
        ];
    }
}
