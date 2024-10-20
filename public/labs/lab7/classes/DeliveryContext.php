<?php

namespace Lab7\classes;

use Lab7\interfaces\DeliveryStrategyInterface;
use Lab7\interfaces\DeliveryContextInterface;

class DeliveryContext implements DeliveryContextInterface
{
    private DeliveryStrategyInterface $strategy;

    public function setStrategy(DeliveryStrategyInterface $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function calculateCost(string $city): int
    {
        return $this->strategy->calculateCost($city);
    }
}