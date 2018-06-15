# Laravel GraphQL Playground

Easily integrate [GraphQL Playground](https://github.com/prismagraphql/graphql-playground) into your Laravel projects

## Installation

    composer require mll-lab/laravel-graphql-playground

If you are using Laravel < 5.4, add the service provider to your `config/app.php`

````php
'providers' => [
    // Other providers...
    MLL\\GraphQLPlayground\\GraphQLPlaygroundServiceProvider::class,
]
````

You may publish the configuration and/or the views:

    php artisan vendor:publish

## Usage

By default, the playground is reachable at `/graphql-playground`

It points to the endpoint `/graphql`
