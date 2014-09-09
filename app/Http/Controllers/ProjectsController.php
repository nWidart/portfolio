<?php namespace Nwidart\Http\Controllers;

use Github\Client;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller;
use GrahamCampbell\GitHub\Facades\GitHub;

class ProjectsController extends Controller
{
    public function index()
    {
        $repositories = GitHub::api('user')->repositories('nwidart', 'owner', 'pushed', 'desc');
        $repositories = new Collection($repositories);
        $repositories = $repositories->take(5);

        return view('pages.projects', compact('repositories'));
    }
}
