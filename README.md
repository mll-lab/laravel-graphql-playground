# Laravel GraphQL Playground

Easily integrate [GraphQL Playground](https://github.com/prismagraphql/graphql-playground) into your Laravel projects.

[![GitHub license](https://img.shields.io/github/license/mll-lab/laravel-graphql-playground.svg)](https://github.com/mll-lab/laravel-graphql-playground/blob/master/LICENSE)
[![Packagist](https://img.shields.io/packagist/v/mll-lab/laravel-graphql-playground.svg)](https://packagist.org/packages/mll-lab/laravel-graphql-playground)
[![Packagist](https://img.shields.io/packagist/dt/mll-lab/laravel-graphql-playground.svg)](https://packagist.org/packages/mll-lab/laravel-graphql-playground)
[![StyleCI](https://github.styleci.io/repos/137498251/shield?branch=master)](https://github.styleci.io/repos/137498251)

[![](https://i.imgur.com/AE5W6OW.png)](https://www.graphqlbin.com/RVIn)

> **Please note**: This is not a GraphQL Server implementation, only a UI for testing and exploring your schema.
> For the server component we recommend [nuwave/lighthouse](https://github.com/nuwave/lighthouse).

## Installation

    composer require mll-lab/laravel-graphql-playground

If you are using Lumen, register the service provider in `bootstrap/app.php`

```php
$app->register(MLL\GraphQLPlayground\GraphQLPlaygroundServiceProvider::class);
```

## Configuration

By default, the playground is reachable at `/graphql-playground`
and assumes a running GraphQL endpoint at `/graphql`.

To change the defaults, publish the configuration with the following command:

    php artisan vendor:publish --tag=graphql-playground-config

You will find the configuration file at `config/graphql-playground.php`.

If you are using Lumen, copy it into that location manually and load the configuration
in your `boostrap/app.php`:

```php
$app->configure('graphql-playground');
```

## Customization

To customize the Playground even further, publish the view:

    php artisan vendor:publish --tag=graphql-playground-view

You can use that for all kinds of customization.

### Change settings of the playground instance

Check https://github.com/prisma/graphql-playground#properties for the allowed config options, for example:

```php
<div id="root" />
<script type="text/javascript">
  window.addEventListener('load', function (event) {
    const loadingWrapper = document.getElementById('loading-wrapper');
    loadingWrapper.classList.add('fadeOut');
    const root = document.getElementById('root');
    root.classList.add('playgroundIn');
    GraphQLPlayground.init(root, {
      endpoint: "{{url(config('graphql-playground.endpoint'))}}",
      settings: {
        'request.credentials': 'same-origin',
      },
    })
  })
</script>
```

### Configure session authentication

Session based authentication can be used with [Laravel Sanctum](https://laravel.com/docs/sanctum).
If you use GraphQL through sessions and CSRF, add the following to the `<head>`
in the published view:

```php
<meta name="csrf-token" content="{{ csrf_token() }}">
```


Modify the Playground config:

```diff
GraphQLPlayground.init(root, {
  endpoint: "{{url(config('graphql-playground.endpoint'))}}",
+ settings: {
+   'request.credentials': 'same-origin',
+ },
+ headers: {
+   'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
+ }
})
```

Make sure your route includes the `web` middleware group in `config/graphql-playground.php`:

```diff
    'route' => [
        'uri' => '/graphql-playground',
        'name' => 'graphql-playground',
+       'middleware' => ['web']
    ]
```
## Local assets

If you want to serve the assets from your own server, you can download them with the command

    php artisan graphql-playground:download-assets

This puts the necessary CSS, JS and Favicon into your `public` directory. If you have
the assets downloaded, they will be used instead of the online version from the CDN.

## Security

If you do not want to enable the GraphQL playground in production, you can disable it in the config file.
The easiest way is to set the environment variable `GRAPHQL_PLAYGROUND_ENABLED=false`.

If you want to protect the route to the GraphQL playground, you can add custom middleware in the config file.
