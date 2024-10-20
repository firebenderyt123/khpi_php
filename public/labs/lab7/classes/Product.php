<?php

namespace Lab7\classes;

use Lab7\interfaces\ProductInterface;

class Product implements ProductInterface
{
    private int $id;
    private string $name;
    private string $description;
    private float $price;
    private int $availableCount;

    public function __construct(int $id,
                                string $name,
                                string $description,
                                float $price,
                                int $availableCount = -1)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->availableCount = $availableCount;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): float
    {
        return ceil($this->price * 100) / 100;
    }

    public function getAvailableCount(): int
    {
        return $this->availableCount;
    }

    public function setAvailableCount(int $count): void
    {
        $this->availableCount = $count;
    }
}