<?php namespace Nwidart\Services\Github;

use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class GithubRepositoryService
{
    public function latest()
    {
        if (!Cache::has('github-projects')) {
            $repositories = GitHub::api('user')->repositories('nwidart', 'owner', 'pushed', 'desc');
            $repositories = new Collection($repositories);
            $repositories = $repositories->take(5);
            Cache::put('github-projects', $repositories, 60);
        }

        return Cache::get('github-projects', []);
    }
}