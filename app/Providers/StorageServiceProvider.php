<?php namespace Nwidart\Providers;

use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Nwidart\Posts\Repositories\PostRepository',
            'Nwidart\Posts\Repositories\File\FilePostRepository'
        );
    }
}