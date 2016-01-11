<?php namespace Modules\Activity\Composers;

use Illuminate\Contracts\View\View;
use Modules\Activity\Services\Activity\ActivityService;
use Modules\Activity\Services\Twitter\TimelineService;

class FooterViewComposer
{
    /**
     * @var ActivityService
     */
    private $githubActivity;
    /**
     * @var TimelineService
     */
    private $twitter;

    public function __construct(ActivityService $githubActivity, TimelineService $twitter)
    {
        $this->githubActivity = $githubActivity;
        $this->twitter = $twitter;
    }

    public function compose(View $view)
    {
        $activities = $this->githubActivity->forUser('nwidart')->activities(3);
        $twitterPosts = $this->twitter->posts('nicolaswidart', 3);

        $view->with(compact('activities', 'twitterPosts'));
    }
}
