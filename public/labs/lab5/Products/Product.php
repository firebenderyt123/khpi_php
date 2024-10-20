<?php

namespace Lab5\Products;

class Product implements ProductInterface
{
    private readonly string $id;
    private readonly string $name;
    private readonly string $description;
    private readonly string $imageSrc;

    public function __construct(string $id,
                                string $name,
                                string $description,
                                string $imageSrc)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->imageSrc = $imageSrc;
    }

    public function getId(): string
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

    public function getImageSrc(): string
    {
        return $this->imageSrc;
    }
}