<?php

namespace Lab1\Storage;

interface StorageInterface
{
    public function upload(string $localPath, string $remotePath): void;
    public function download(string $remotePath, string $localPath): void;
    public function createFile(string $filePath): void;
    public function createFolder(string $folderPath): void;
    public function delete(string $filePath): void;
    public function listFolder(string $folderPath): void;
}