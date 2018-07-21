# Laravel GraphQL Playground

Easily integrate [GraphQL Playground](https://github.com/prismagraphql/graphql-playground) into your Laravel projects.

[![GitHub license](https://img.shields.io/github/license/mll-lab/laravel-graphql-playground.svg)](https://github.com/mll-lab/laravel-graphql-playground/blob/master/LICENSE)
[![Packagist](https://img.shields.io/packagist/v/mll-lab/laravel-graphql-playground.svg)](https://packagist.org/packages/mll-lab/laravel-graphql-playground)
[![Packagist](https://img.shields.io/packagist/dt/mll-lab/laravel-graphql-playground.svg)](https://packagist.org/packages/mll-lab/laravel-graphql-playground)

[![](https://i.imgur.com/AE5W6OW.png)](https://www.graphqlbin.com/RVIn)

> **Please note**: This is not a full GraphQL Server implementation, only a UI for testing your implementation. For the server component we recommend [nuwave/lighthouse](https://github.com/nuwave/lighthouse).

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

    php artisan vendor:publish --provider="MLL\GraphQLPlayground\GraphQLPlaygroundServiceProvider"

## Usage

By default, the playground is reachable at `/graphql-playground`

It assumes a running GraphQL endpoint at `/graphql`. You can enter another URL in the
UI or change the default setting in the configuration file.

## Security

For security reasons you might want to:
- disable this is production completely (see `enabled` configuration)
  or
- apply a custom middleware protecting the route (see `middleware` configuration)
