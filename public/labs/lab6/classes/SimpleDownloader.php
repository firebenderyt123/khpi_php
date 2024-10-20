<?php

namespace Lab6\classes;

use Lab6\interfaces\DownloaderInterface;

class SimpleDownloader implements DownloaderInterface
{
    public function download(string $url): string
    {
        return "Download $url<br>";
    }
}