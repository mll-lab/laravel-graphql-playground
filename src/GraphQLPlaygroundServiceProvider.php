<?php

declare(strict_types=1);

namespace MLL\GraphQLPlayground;

use Illuminate\Contracts\Config\Repository as ConfigRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class GraphQLPlaygroundServiceProvider extends ServiceProvider
{
    const CONFIG_PATH = __DIR__.'/graphql-playground.php';
    const VIEW_PATH = __DIR__.'/../views';

    /**
     * Perform post-registration booting of services.
     *
     * @param  \Illuminate\Contracts\Config\Repository  $config
     *
     * @return void
     */
    public function boot(ConfigRepository $config): void
    {
        $this->loadViewsFrom(self::VIEW_PATH, 'graphql-playground');

        $this->publishes([
            self::CONFIG_PATH => $this->configPath('graphql-playground.php'),
        ], 'graphql-playground-config');

        $this->publishes([
            self::VIEW_PATH => $this->resourcePath('views/vendor/graphql-playground'),
        ], 'graphql-playground-view');

        if (! $config->get('graphql-playground.enabled', true)) {
            return;
        }

        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }

    /**
     * Load routes from provided path.
     *
     * @param  string  $path
     *
     * @return void
     */
    protected function loadRoutesFrom($path): void
    {
        if (Str::contains($this->app->version(), 'Lumen')) {
            require realpath($path);

            return;
        }

        parent::loadRoutesFrom($path);
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(self::CONFIG_PATH, 'graphql-playground');

        if ($this->app->runningInConsole()) {
            $this->commands([
                \MLL\GraphQLPlayground\DownloadAssetsCommand::class,
            ]);
        }
    }

    protected function configPath(string $path): string
    {
        return $this->app->basePath('config/'.$path);
    }

    protected function resourcePath(string $path): string
    {
        return $this->app->basePath('resources/'.$path);
    }
}
