<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | GraphQL Playground route
    |--------------------------------------------------------------------------
    |
    | Set the route to which the GraphQL Playground responds.
    | The default endpoint is "yourdomain.com/graphql-playground".
    |
    */

    'route_name' => 'graphql-playground',

    /*
    |--------------------------------------------------------------------------
    | Route configuration
    |--------------------------------------------------------------------------
    |
    | Additional configuration for the route group https://lumen.laravel.com/docs/routing#route-groups
    |
    | For domain config it could be something like:
    | 'domain' => 'graphql.' . env('APP_DOMAIN', 'localhost'),
    |
    */

    'route' => [
        // 'prefix' => '',
        // 'middleware' => ['web']
        'domain' => env('GRAPHQL_PLAYGROUND_DOMAIN', null),
    ],

    /*
    |--------------------------------------------------------------------------
    | Default GraphQL endpoint
    |--------------------------------------------------------------------------
    |
    | The default endpoint that the Playground UI is set to.
    | It assumes you are running GraphQL from the same Laravel instance,
    | but can be set to any URL.
    |
    */

    'endpoint' => 'graphql',

    /*
    |--------------------------------------------------------------------------
    | Control Playground availability
    |--------------------------------------------------------------------------
    |
    | Control if the playground is accessible at all.
    | This allows you to disable it in certain environments,
    | for example you might not want it active in production.
    |
    */

    'enabled' => env('GRAPHQL_PLAYGROUND_ENABLED', true),
];
