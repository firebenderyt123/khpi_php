<?php

require_once __DIR__ . '/Storage.php';
require_once __DIR__ . '/../interfaces/StorageInterface.php';

class LocalStorage extends Storage implements StorageInterface
{
    public function upload(string $localPath, string $remotePath): void
    {
        copy($localPath, $remotePath);
    }

    public function download(string $remotePath, string $localPath): void
    {
        copy($remotePath, $localPath);
    }

    public function createFile(string $filePath, int $permissions = 0644): void
    {
        if (!file_exists($filePath)) {
            $file = fopen($filePath, "w");
            if ($file) {
                fclose($file);
                chmod($filePath, $permissions);
            } else {
                echo "Couldn't create file '$filePath'.";
            }
        } else {
            echo "File '$filePath' already exists.";
        }
    }

    public function createFolder(string $folderPath, int $permissions = 0750): void
    {
        if (!is_dir($folderPath)) {
            if (!mkdir($folderPath, $permissions, true))
                echo "Couldn't create folder '$folderPath'.";
        } else {
            echo "Folder '$folderPath' already exists.";
        }
    }

    public function delete(string $path): void
    {
        if (is_file($path)) {
            if (!unlink($path)) {
                echo "Couldn't delete file '$path'.";
            }
        } elseif (is_dir($path)) {
            $this->deleteDirectory($path);
        } else {
            echo "Path: '$path' is not file or directory.";
        }
    }

    public function listFolder(string $folderPath): void
    {
        if (is_dir($folderPath)) {
            $files = scandir($folderPath);

            $files = array_diff($files, array('.', '..'));

            foreach ($files as $file) {
                echo $file . "<br>";
            }
        } else {
            echo "Directory '$folderPath' is not exists.";
        }
    }

    private function deleteDirectory(string $dirPath): void
    {
        if (is_dir($dirPath)) {
            $files = array_diff(scandir($dirPath), ['.', '..']);

            foreach ($files as $file) {
                $filePath = $dirPath . DIRECTORY_SEPARATOR . $file;
                if (is_dir($filePath)) {
                    $this->deleteDirectory($filePath);
                } else {
                    unlink($filePath);
                }
            }

            if (!rmdir($dirPath)) {
                echo "Couldn't delete directory '$dirPath'.";
            }
        } else {
            echo "Directory '$dirPath' is not exists.";
        }
    }
}