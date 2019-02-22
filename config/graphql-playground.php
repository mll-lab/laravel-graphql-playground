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

    /*
    |--------------------------------------------------------------------------
    | Domain Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify your domain/subdomain that is going to be used
    | as GraphQL Playground endpoint.
    | Could be something like:
    |
    | 'domain' => 'graphql.' . env('APP_DOMAIN', 'localhost'),
    |
    */

    'domain' => env('GRAPHQL_PLAYGROUND_DOMAIN', null),,

    /*
    |--------------------------------------------------------------------------
    | Route for the GraphQL endpoint
    |--------------------------------------------------------------------------
    |
    */

    'endpoint' => 'graphql',

    /*
    |--------------------------------------------------------------------------
    | Route for the GraphQL endpoint
    |--------------------------------------------------------------------------
    |
    | Control if the playground is accessible at all
    | This allows you to disable it completely in production
    |
    */

    'enabled' => env('GRAPHQL_PLAYGROUND_ENABLED', true),
];
