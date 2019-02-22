<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | GraphQL endpoint
    |--------------------------------------------------------------------------
    |
    | Set the endpoint to which the GraphQL Playground  responds.
    | The default route endpoint is "yourdomain.com/graphql-playground".
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
    */

    'route' => [
        'prefix' => '',
        // 'middleware' => ['web']
    ],

    // Route for the GraphQL endpoint
    'endpoint' => 'graphql',

    // Control if the playground is accessible at all
    // This allows you to disable it completely in production
    'enabled' => env('GRAPHQL_PLAYGROUND_ENABLED', true),
];
