<?php

return [
    // Route for the frontend
    'route' => 'graphql-playground',
    
    // Which middleware to apply, if any
    'middleware' => [
        // 'web',
    ],
    
    // Route for the GraphQL endpoint
    'endpoint' => 'graphql',

    // Control if the playground is accessible at all
    // This allows you to disable it completely in production
    'enabled' => env('GRAPHQL_PLAYGROUND_ENABLED', true),
];
