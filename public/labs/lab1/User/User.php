<?php

namespace Lab1\User;

use Lab1\Storage\StorageInterface;

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