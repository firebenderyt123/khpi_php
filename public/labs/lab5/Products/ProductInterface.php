<?php

namespace Lab5\Products;

interface ProductInterface
{
    public function getId(): string;
    public function getName(): string;
    public function getDescription(): string;
    public function getImageSrc(): string;
}