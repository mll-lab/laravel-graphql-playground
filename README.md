# Laravel GraphQL Playground

Easily integrate [GraphQL Playground](https://github.com/prismagraphql/graphql-playground) into your Laravel projects.

[![GitHub license](https://img.shields.io/github/license/mll-lab/laravel-graphql-playground.svg)](https://github.com/mll-lab/laravel-graphql-playground/blob/master/LICENSE)
[![Packagist](https://img.shields.io/packagist/v/mll-lab/laravel-graphql-playground.svg)](https://packagist.org/packages/mll-lab/laravel-graphql-playground)
[![Packagist](https://img.shields.io/packagist/dt/mll-lab/laravel-graphql-playground.svg)](https://packagist.org/packages/mll-lab/laravel-graphql-playground)
[![StyleCI](https://github.styleci.io/repos/137498251/shield?branch=master)](https://github.styleci.io/repos/137498251)

[![](https://i.imgur.com/AE5W6OW.png)](https://www.graphqlbin.com/RVIn)

> **Please note**: This is not a GraphQL Server implementation, only a UI for testing and exploring your schema. For the server component we recommend [nuwave/lighthouse](https://github.com/nuwave/lighthouse).

## Installation

    composer require mll-lab/laravel-graphql-playground

If you are using Laravel < 5.4, add the service provider to your `config/app.php`

```php
'providers' => [
    // Other providers...
    MLL\\GraphQLPlayground\\GraphQLPlaygroundServiceProvider::class,
]
```

You may publish the configuration and/or the views:

    php artisan vendor:publish --provider="MLL\GraphQLPlayground\GraphQLPlaygroundServiceProvider"

## Usage

By default, the playground is reachable at `/graphql-playground`
and assumes a running GraphQL endpoint at `/graphql`.

If your endpoint is located somewhere else, you can change the setting
in the published `config/graphql-playground.php`:

```php
    'endpoint' => 'any-url.com/route',
```

If you want to change arbitrary options of the UI, you can publish the view
and add [possible settings to the playground instance](https://github.com/prisma/graphql-playground#properties),
for example:

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

### Local assets

If you want to serve the assets from your own server, you can download them with the command

    php artisan graphql-playground:download-assets

This puts the necessary CSS, JS and Favicon into your `public` directory. If you have
the assets downloaded, they will be used instead of the online version from the CDN.

## Security

If you do not want to enable the GraphQL playground in production, you can disable it in the config file.
The easiest way is to set the environment variable `GRAPHQL_PLAYGROUND_ENABLED=false`

If you want to add custom middleware to protect the route to the GraphQL playground, you can
add it in the configuration file.
