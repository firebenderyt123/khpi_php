<?php

namespace Lab7\interfaces;

interface DeliveryStrategyInterface
{
    public function calculateCost(string $city): int;
}