<?php

return [
    // Whether to enable it; you want to to disable this in production
    'enabled' => env('GRAPHQL_PLAYGROUND_ENABLED', true),

    // Route for the frontend
    'route' => 'graphql-playground',

    // Route for the GraphQL endpoint
    'endpoint' => 'graphql',

    // Which middleware to apply, if any
    'middleware' => [
        // 'web',
    ],
];
