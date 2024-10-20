<?php

namespace Lab7\classes;

use Lab7\interfaces\DeliveryStrategyInterface;

class PickupStrategy implements DeliveryStrategyInterface
{
    public function calculateCost(string $city): int
    {
        return 0;
    }
}