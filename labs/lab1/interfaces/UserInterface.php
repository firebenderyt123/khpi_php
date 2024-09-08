<?php

require_once __DIR__ . '/StorageInterface.php';

interface UserInterface
{
    public function storage(): StorageInterface;
}