<?php namespace Nwidart\Http\Controllers;

use Illuminate\Routing\Controller;
use Nwidart\Services\Activity\ActivityService;

class ProjectsController extends Controller
{
    public function index(ActivityService $githubActivity)
    {
        $activities = $githubActivity->forUser('nwidart')->activities();

        return view('pages.projects', compact('repositories', 'activities'));
    }
}
