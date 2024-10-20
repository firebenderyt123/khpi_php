<?php

require __DIR__ . '/../../../vendor/autoload.php';

use Lab6\classes\CachingDownloader;
use Lab6\classes\SimpleDownloader;

$simpleDownloader = new SimpleDownloader();
$downloader = new CachingDownloader($simpleDownloader);

echo $downloader->download("a") . "<br>";
echo $downloader->download("b") . "<br>";
echo $downloader->download("a") . "<br>";
$downloader->clearCache();
echo $downloader->download("a") . "<br>";