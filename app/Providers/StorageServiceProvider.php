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
            'Nwidart\Http\Posts\Repositories\PostRepository',
            'Nwidart\Http\Posts\Repositories\File\FilePostRepository'
        );
    }
}