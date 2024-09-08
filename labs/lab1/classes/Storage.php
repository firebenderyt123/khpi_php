<?php

require_once __DIR__ . '/Singleton.php';
require_once __DIR__ . '/../interfaces/StorageInterface.php';

abstract class Storage extends Singleton implements StorageInterface
{
    abstract public function upload(string $localPath, string $remotePath): void;
    abstract public function download(string $remotePath, string $localPath): void;
    abstract public function createFile(string $filePath): void;
    abstract public function createFolder(string $folderPath): void;
    abstract public function delete(string $filePath): void;
    abstract public function listFolder(string $folderPath): void;
}