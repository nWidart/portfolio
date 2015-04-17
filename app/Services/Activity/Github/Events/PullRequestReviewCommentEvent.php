<?php namespace Nwidart\Services\Activity\Github\Events;

class PullRequestReviewCommentEvent extends BaseEventClass implements GithubEventInterface
{
    public function handle($eventData)
    {
        return [
            'time' => $this->getDate($eventData['created_at']),
            'actor' => $eventData['actor']['login'],
            'actor_avatar' => $eventData['actor']['avatar_url'],
            'verb' => "Commented on ",
            'action_object' => 'pull request',
            'target' => $eventData['payload']['comment']['_links']['html']['href']
        ];
    }
}
