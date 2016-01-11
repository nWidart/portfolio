<?php namespace Modules\Activity\Services\Activity\Github\Events;

class GollumEvent extends BaseEventClass implements GithubEventInterface
{
    public function handle($eventData)
    {
        return [
            'time' => $this->getDate($eventData['created_at']),
            'actor' => $eventData['actor']['login'],
            'actor_avatar' => $eventData['actor']['avatar_url'],
            'verb' => "Updated Wiki ",
            'action_object' => $eventData['payload']['pages'][0]['page_name'],
            'target' => $eventData['payload']['pages'][0]['html_url']
        ];
    }
}
