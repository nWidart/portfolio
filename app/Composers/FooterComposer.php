<?php namespace Nwidart\Composers;

use Nwidart\Services\Activity\ActivityService;

class FooterComposer
{
    /**
     * @var ActivityService
     */
    private $githubActivity;

    public function __construct(ActivityService $githubActivity)
    {
        $this->githubActivity = $githubActivity;
    }
    public function compose($view)
    {
        $activities = $this->githubActivity->forUser('nwidart')->activities(3);

        $view->with(compact('activities'));
    }
}