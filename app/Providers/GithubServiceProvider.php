<?php namespace Nwidart\Providers;

use Illuminate\Support\ServiceProvider;

class GithubServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Nwidart\Services\Activity\EventFactoryInterface',
            'Nwidart\Services\Activity\Github\GithubEventFactory'
        );
    }
}