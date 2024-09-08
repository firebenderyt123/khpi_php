<?php

interface SingletonInterface
{
    public static function getInstance(): static;
}