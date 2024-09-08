<?php

require_once __DIR__ . '/Storage.php';
require_once __DIR__ . '/../interfaces/StorageInterface.php';

class AwsStorage extends Storage implements StorageInterface
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