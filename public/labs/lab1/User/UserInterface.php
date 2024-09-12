<?php

namespace Lab1\User;

use Lab1\Storage\StorageInterface;

interface UserInterface
{
    public function storage(): StorageInterface;
}