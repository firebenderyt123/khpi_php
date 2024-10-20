<?php

namespace Lab7\interfaces;

interface DeliveryContextInterface
{
    public function setStrategy(DeliveryStrategyInterface $strategy): void;
    public function calculateCost(string $city): int;
}