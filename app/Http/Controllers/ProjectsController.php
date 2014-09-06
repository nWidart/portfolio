<?php namespace Nwidart\Http\Controllers;

use Illuminate\Routing\Controller;

class ProjectsController extends Controller
{
    public function index()
    {
        return view('pages.projects');
    }
}
