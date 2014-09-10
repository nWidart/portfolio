<?php namespace Nwidart\Services\Activity;

use Github\Client;
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

    public function activities()
    {
        $rawActivities = $this->getRawActivities(5);

        $cleanedActivities = [];
        foreach ($rawActivities as $rawActivity) {
            $cleanedActivities[] = $this->eventFactory->make($rawActivity['type'])->handle($rawActivity);
        }

        return $cleanedActivities;
    }

    private function getRawActivities($limit = 5)
    {
        if (!Cache::has("{$this->user}-events")) {
            $client = new Client();
            $response = $client->getHttpClient()->get("users/{$this->user}/events");

            $activities = ResponseMediator::getContent($response);
            $activities = array_slice($activities, 0, $limit);
            Cache::put("{$this->user}-events", $activities, 120);
        }

        return Cache::get("{$this->user}-events", []);
    }
}