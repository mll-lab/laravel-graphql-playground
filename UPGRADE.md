# Upgrade guide

This document provides guidance for upgrading between major versions.

## v1 to v2

Compare your `graphql-playground.php` against the latest [default configuration](src/graphql-playground.php).
The configuration options for the `route` changed.

If you were calling the `GraphQLPlaygroundController` directly, change the reference
to use `__invoke()`:

```diff
-'uses' => \MLL\GraphQLPlayground\GraphQLPlaygroundController::class . '@get',
+'uses' => \MLL\GraphQLPlayground\GraphQLPlaygroundController::class,
```
