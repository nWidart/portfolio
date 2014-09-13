<?php namespace Nwidart\Services\Activity;

use Github\Client;
use Github\HttpClient\Cache\FilesystemCache;
use Github\HttpClient\CachedHttpClient;
use Github\HttpClient\Message\ResponseMediator;
use Illuminate\Support\Facades\Cache;

class ActivityService
{
    protected $user;

    /**
     * @var EventFactoryInterface
     */
    private $eventFactory;

    public function __construct(EventFactoryInterface $eventFactory)
    {
        $this->eventFactory = $eventFactory;
    }

    public function forUser($user)
    {
        $this->user = $user;

        return $this;
    }

    public function activities($limit = 5)
    {
        $rawActivities = $this->getRawActivities($limit);

        $cleanedActivities = [];
        foreach ($rawActivities as $rawActivity) {
            $cleanedActivities[] = $this->eventFactory->make($rawActivity['type'])->handle($rawActivity);
        }

        return $cleanedActivities;
    }

    private function getRawActivities($limit = 5)
    {
        if (!Cache::has("{$this->user}-events-{$limit}")) {
            $client = new CachedHttpClient();
            $client->setCache(
                new FilesystemCache(base_path() . '/storage/github-api-cache')
            );
            $client = new Client($client);
            $client->authenticate(getenv('github-token'), 'http_token');
            $response = $client->getHttpClient()->get("users/{$this->user}/events");

            $activities = ResponseMediator::getContent($response);
            $activities = array_slice($activities, 0, $limit);
            Cache::put("{$this->user}-events-{$limit}", $activities, 120);
        }

        return Cache::get("{$this->user}-events-{$limit}", []);
    }
}