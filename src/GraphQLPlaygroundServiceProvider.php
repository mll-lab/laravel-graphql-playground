<?php

declare(strict_types=1);

namespace MLL\GraphQLPlayground;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class GraphQLPlaygroundServiceProvider extends ServiceProvider
{
    const CONFIG_PATH = __DIR__.'/../config/graphql-playground.php';
    const VIEW_PATH = __DIR__.'/../views';

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(self::VIEW_PATH, 'graphql-playground');

        $this->publishes([
            self::CONFIG_PATH => config_path('graphql-playground.php'),
        ], 'config');

        $this->publishes([
            self::VIEW_PATH => resource_path('views/vendor/graphql-playground'),
        ], 'views');

        if (!config('graphql-playground.enabled', true)) {
            return;
        }

        Route::group(
            config('graphql-playground.route'),
            function (): void {
                Route::get(
                    config('graphql-playground.route_name', 'graphql-playground'),
                    GraphQLPlaygroundController::class.'@get'
                )->name('graphql-playground');
            }
        );
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(self::CONFIG_PATH, 'graphql-playground');

        if ($this->app->runningInConsole()) {
            $this->commands([
                \MLL\GraphQLPlayground\DownloadAssetsCommand::class,
            ]);
        }
    }
}
