<?php

namespace Lab1\Storage;

class AwsStorage extends Storage
{
    function upload(string $localPath, string $remotePath): void
    {
        // TODO: Implement upload() method.
    }

    function download(string $remotePath, string $localPath): void
    {
        // TODO: Implement download() method.
    }

    function createFile(string $filePath): void
    {
        // TODO: Implement createFile() method.
    }

    function createFolder(string $folderPath): void
    {
        // TODO: Implement createFolder() method.
    }

    function delete(string $filePath): void
    {
        // TODO: Implement delete() method.
    }

    function listFolder(string $folderPath): void
    {
        // TODO: Implement listFolder() method.
    }
}