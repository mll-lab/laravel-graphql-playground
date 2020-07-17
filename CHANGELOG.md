# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## Unreleased

## v2.3.0

### Changed

- Namespace tags for `php artisan vendor:publish` under `graphql-playground-` prefix

## v2.2.1

### Fixed

- Fix loading removal by removing remaining bits

## v2.2.0

### Changed

- Simplify view by excluding loading animation

## v2.1.0

### Added

- Support Laravel 7

## v2.0.2

### Fixed

- Lumen compatibility: Do not use `public_path()` helper

## v2.0.1

### Fixed

- Lumen compatibility: Remove usage of unavailable path helpers

## v2.0.0

### Added

- Support Lumen
- Load routes through a file: `src/routes.php`

### Changed

- Make the `GraphQLPlaygroundController` use `__invoke()` instead of `get()`
- Move the `route_name` configuration option into `route.uri`

### Removed

- Disable the `route.domain` configuration option by default

## Pre-v2

We just started maintaining a changelog starting from v2.

If someone wants to make one for previous versions, PR's are welcome.
