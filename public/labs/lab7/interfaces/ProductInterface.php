<?php

namespace Lab7\interfaces;

interface ProductInterface
{
    public function getId(): int;
    public function getName(): string;
    public function getDescription(): string;
    public function getPrice(): float;
    public function getAvailableCount(): int;
    public function setAvailableCount(int $count): void;
}