<?php namespace Modules\Activity\Composers;

use Illuminate\Contracts\View\View;
use Modules\Activity\Services\Activity\ActivityService;

class GithubActivityComposer
{
    /**
     * @var ActivityService
     */
    private $githubActivity;

    public function __construct(ActivityService $githubActivity)
    {
        $this->githubActivity = $githubActivity;
    }

    public function compose(View $view)
    {
        $view->with('activities', $this->githubActivity->forUser('nwidart')->activities());
    }
}
