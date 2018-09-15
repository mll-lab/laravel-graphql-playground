<?php

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
    
    public function handle()
    {
        $this->fileForceContents(
            public_path(self::CSS_PATH_LOCAL),
            file_get_contents('https:' . self::CSS_PATH_CDN)
        );
        $this->fileForceContents(
            public_path(self::JS_PATH_LOCAL),
            file_get_contents('https:' . self::JS_PATH_CDN)
        );
        $this->fileForceContents(
            public_path(self::FAVICON_PATH_LOCAL),
            file_get_contents('https:' . self::FAVICON_PATH_CDN)
        );
    }
    
    protected function fileForceContents(string $filePath, string $contents)
    {
        // Split by directory, e.g. /foo/bar -> ["foo", "bar"]
        $parts = explode(DIRECTORY_SEPARATOR, $filePath);
        // Last one is the actual filename
        $fileName = array_pop($parts);
        
        // Start at the root directory
        $path = '';
        foreach ($parts as $part) {
            if (!is_dir($path .= DIRECTORY_SEPARATOR . $part)) {
                mkdir($path);
            }
        }
        
        file_put_contents(
            $path . DIRECTORY_SEPARATOR . $fileName,
            $contents
        );
    }
}
