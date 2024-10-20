<?php

namespace Lab6\classes;

use Lab6\interfaces\DownloaderInterface;

class CachingDownloader implements DownloaderInterface
{
    private DownloaderInterface $downloader;
    private array $cache;

    public function __construct(DownloaderInterface $downloader)
    {
        $this->downloader = $downloader;
        $this->cache = [];
    }

    public function download(string $url): string
    {
        if (!isset($this->cache[$url]))
        {
            echo "Returned not cached data<br>";
            $result = $this->downloader->download($url);
            $this->cache[$url] = $result;
        }
        else
        {
            echo "Returned cached data<br>";
        }
        return $this->cache[$url];
    }

    public function clearCache(): void
    {
        $this->cache = [];
        echo "Cache cleared<br>";
    }
}