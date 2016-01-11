<?php namespace Modules\Activity\Services\Activity\Github\Events;

class DeleteEvent extends BaseEventClass implements GithubEventInterface
{
    public function handle($eventData)
    {
        return [
            'time' => $this->getDate($eventData['created_at']),
            'actor' => $eventData['actor']['login'],
            'actor_avatar' => $eventData['actor']['avatar_url'],
            'verb' => "deleted {$eventData['payload']['ref_type']}",
            'action_object' => $eventData['payload']['ref'],
            'target' => $this->getGithubUrl($eventData['repo']['name'])
        ];
    }
}
