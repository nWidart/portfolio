<?php namespace Modules\Activity\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Activity\Composers\FooterViewComposer;
use Modules\Activity\Composers\GithubActivityComposer;
use Modules\Activity\Services\Activity\EventFactoryInterface;
use Modules\Activity\Services\Activity\Github\GithubEventFactory;

class ActivityServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            EventFactoryInterface::class,
            GithubEventFactory::class
        );

        view()->composer(['projects'], GithubActivityComposer::class);
        view()->composer(['partials.footer'], FooterViewComposer::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }
}
