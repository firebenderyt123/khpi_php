<?php

namespace Lab6\interfaces;

interface DownloaderInterface
{
    public function download(string $url): string;
}