<?php

declare(strict_types=1);

namespace MLL\GraphQLPlayground;

use Illuminate\Console\Command;

class DownloadAssetsCommand extends Command
{
    const JS_PATH_LOCAL = 'vendor/graphql-playground/middleware.js';
    const JS_PATH_CDN = '//cdn.jsdelivr.net/npm/graphql-playground-react/build/static/js/middleware.js';

    const CSS_PATH_LOCAL = 'vendor/graphql-playground/index.css';
    const CSS_PATH_CDN = '//cdn.jsdelivr.net/npm/graphql-playground-react/build/static/css/index.css';

    const FAVICON_PATH_LOCAL = 'vendor/graphql-playground/favicon.png';
    const FAVICON_PATH_CDN = '//cdn.jsdelivr.net/npm/graphql-playground-react/build/favicon.png';

    protected $signature = 'graphql-playground:download-assets';

    protected $description = 'Download the newest version of the GraphQLPlayground assets to serve them locally.';

    public function handle(): void
    {
        $this->fileForceContents(
            self::publicPath(self::CSS_PATH_LOCAL),
            file_get_contents('https:'.self::CSS_PATH_CDN)
        );
        $this->fileForceContents(
            self::publicPath(self::JS_PATH_LOCAL),
            file_get_contents('https:'.self::JS_PATH_CDN)
        );
        $this->fileForceContents(
            self::publicPath(self::FAVICON_PATH_LOCAL),
            file_get_contents('https:'.self::FAVICON_PATH_CDN)
        );
    }

    protected function fileForceContents(string $filePath, string $contents): void
    {
        // Ensure the directory exists
        $directory = dirname($filePath);
        if (! is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        file_put_contents(
            $filePath,
            $contents
        );
    }

    public static function jsPath(): string
    {
        return self::assetPath(self::JS_PATH_LOCAL, self::JS_PATH_CDN);
    }

    public static function cssPath(): string
    {
        return self::assetPath(self::CSS_PATH_LOCAL, self::CSS_PATH_CDN);
    }

    public static function faviconPath(): string
    {
        return self::assetPath(self::FAVICON_PATH_LOCAL, self::FAVICON_PATH_CDN);
    }

    protected static function assetPath(string $local, string $cdn): string
    {
        return file_exists(self::publicPath($local))
            ? self::asset($local)
            : $cdn;
    }

    protected static function asset(string $path): string
    {
        return app('url')->asset($path);
    }

    protected static function publicPath(string $path): string
    {
        return app()->basePath('public/'.$path);
    }
}
