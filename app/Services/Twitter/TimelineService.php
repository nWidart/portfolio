<?php namespace Nwidart\Services\Twitter;

use Illuminate\Support\Facades\Cache;
use Thujohn\Twitter\Twitter;

class TimelineService
{
    /**
     * @var Twitter
     */
    private $twitter;

    public function __construct(Twitter $twitter)
    {
        $this->twitter = $twitter;
    }

    public function posts($account, $limit = 5)
    {
        $posts = $this->getPosts($account, $limit);
        $cleanedPosts = [];
        foreach ($posts as $post) {
            $cleanedPosts[] = $this->formatPost($post);
        }

        return $cleanedPosts;
    }

    private function getPosts($account, $limit)
    {
        if (!Cache::has("$account-twitter-timeline-$limit")) {
            $posts = $this->twitter->getUserTimeline(['screen_name' => $account, 'count' => $limit]);
            Cache::put("$account-twitter-timeline-$limit", $posts, 120);
        }

        return Cache::get("$account-twitter-timeline-$limit", []);
    }

    private function formatPost($post)
    {
        return [
            'time' => $this->getDate($post->created_at),
            'handle' => $post->user->screen_name,
            'tweet' => $this->twitter->linkify($post->text),
            'url' => $this->twitter->linkTweet($post),
        ];
    }

    private function getDate($date)
    {
        $timestamp = strtotime($date);

        return $this->twitter->ago($timestamp);
    }
}