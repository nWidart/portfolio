<?php namespace Nwidart\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller;
use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Support\Facades\Cache;

class ProjectsController extends Controller
{
    public function index()
    {
        if (!Cache::has('github-projects')) {
            $repositories = GitHub::api('user')->repositories('nwidart', 'owner', 'pushed', 'desc');
            $repositories = new Collection($repositories);
            $repositories = $repositories->take(5);
            Cache::put('github-projects', $repositories, 60);
        }
        $repositories = Cache::get('github-projects', []);

        return view('pages.projects', compact('repositories'));
    }
}
