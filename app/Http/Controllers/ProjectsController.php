<?php namespace Nwidart\Http\Controllers;

use Illuminate\Routing\Controller;
use Nwidart\Services\Github\GithubRepositoryService;

class ProjectsController extends Controller
{
    public function index(GithubRepositoryService $githubRepository)
    {
        $repositories = $githubRepository->latest();

        return view('pages.projects', compact('repositories'));
    }
}
