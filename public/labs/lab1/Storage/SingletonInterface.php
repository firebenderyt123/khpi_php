<?php

namespace Lab1\Storage;

interface SingletonInterface
{
    public static function getInstance(): static;
}