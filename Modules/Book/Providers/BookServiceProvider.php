<?php namespace Modules\Book\Providers;

use Illuminate\Support\ServiceProvider;

class BookServiceProvider extends ServiceProvider
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
        $this->registerBindings();
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

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Book\Repositories\BookRepository',
            function () {
                $repository = new \Modules\Book\Repositories\Eloquent\EloquentBookRepository(new \Modules\Book\Entities\Book());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Book\Repositories\Cache\CacheBookDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Book\Repositories\StatusRepository',
            function () {
                $repository = new \Modules\Book\Repositories\Eloquent\EloquentStatusRepository(new \Modules\Book\Entities\Status());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Book\Repositories\Cache\CacheStatusDecorator($repository);
            }
        );
// add bindings


    }
}
