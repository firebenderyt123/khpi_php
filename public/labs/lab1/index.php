<?php

require __DIR__ . '/../../../vendor/autoload.php';

use Lab1\Storage\AwsStorage;
use Lab1\Storage\LocalStorage;
use Lab1\User\User;

$locStorage   = LocalStorage::getInstance();
$awsStorage   = AwsStorage::getInstance();
$awsStorage2  = AwsStorage::getInstance();

if ($awsStorage === $awsStorage2) {
    echo "Singleton works, both variables contain the same instance.<br>";
} else {
    echo "Singleton failed, variables contain different instances.<br>";
}

$user1 = new User($locStorage);
$user2 = new User($awsStorage);

if ($user1 === $user2) {
    echo "User1 is User2.<br>";
} else {
    echo "User1 is not User2.<br>";
}

$localPath = __DIR__ . '/storages/source';
$remotePath = __DIR__ . '/storages/remote';
$localStorage = $user1->storage();

echo "--- local folder ---<br>";
$localStorage->listFolder($localPath);
echo "--- local folder ---<br>";
$localStorage->createFolder($localPath . '/testFolder');
$localStorage->createFile($localPath . '/test.txt');
$localStorage->listFolder($localPath);

echo "--- remote folder ---<br>";
$localStorage->upload($localPath . '/test.txt', $remotePath . '/test.txt');
$localStorage->listFolder($remotePath);

echo "--- local folder ---<br>";
$localStorage->delete($localPath . '/test.txt');
$localStorage->listFolder($localPath);

echo "--- local folder (/testFolder) ---<br>";
$localStorage->download($remotePath . '/test.txt', $localPath . '/testFolder/test.txt');
$localStorage->listFolder($localPath . '/testFolder');
$localStorage->delete($localPath . '/testFolder');
$localStorage->delete($remotePath . '/test.txt');

echo "--- local folder ---<br>";
$localStorage->listFolder($localPath);