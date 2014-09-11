<?php namespace Nwidart\Composers;

use Nwidart\Services\Activity\ActivityService;
use Nwidart\Services\Twitter\TimelineService;

class FooterComposer
{
    /**
     * @var ActivityService
     */
    private $githubActivity;
    /**
     * @var Twitter
     */
    private $twitter;

    public function __construct(ActivityService $githubActivity, TimelineService $twitter)
    {
        $this->githubActivity = $githubActivity;
        $this->twitter = $twitter;
    }
    public function compose($view)
    {
        $activities = $this->githubActivity->forUser('nwidart')->activities(3);

        $twitterPosts = $this->twitter->posts('nicolaswidart', 3);

        $view->with(compact('activities', 'twitterPosts'));
    }
}