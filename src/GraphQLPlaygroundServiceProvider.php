<?php

namespace GraphQLPlaygroundServiceProvider;

use GraphQLPlayground\Console\PublishCommand;
use Illuminate\Support\ServiceProvider;

class GraphQLPlaygroundServiceProvider extends ServiceProvider
{
    const CONFIG_PATH = __DIR__ . '/../config/grapqhl-playground.php';
    const VIEW_PATH = __DIR__ . '/../resources/views';
    
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(self::VIEW_PATH, 'graphiql');
        
        $this->publishes([
            self::CONFIG_PATH => config_path('graphql-playground.php'),
        ], 'config');
        
        $this->publishes([
            self::VIEW_PATH => resource_path('views/vendor/graphql-playground'),
        ], 'views');
        
        \Route::get(config('graphql-playground.frontend'), function (){
            return view('graphql-playground::index');
        });
    }
    
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(self::CONFIG_PATH, 'graphql-playground');
    }
}
