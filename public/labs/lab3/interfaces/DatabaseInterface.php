<?php

namespace Lab3\interfaces;

interface DatabaseInterface
{
    public function connect(): void;
    public function query(string $sql): array;
    public function close(): void;
}