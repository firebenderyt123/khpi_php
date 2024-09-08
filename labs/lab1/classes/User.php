<?php

require_once __DIR__ . '/../interfaces/StorageInterface.php';
require_once __DIR__ . '/../interfaces/UserInterface.php';

class User implements UserInterface
{
    private readonly StorageInterface $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    public function storage(): StorageInterface
    {
        return $this->storage;
    }
}