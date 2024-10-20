<?php

namespace Lab7\classes;

use Lab7\interfaces\DeliveryStrategyInterface;

class OwnDeliveryStrategy implements DeliveryStrategyInterface
{
    private array $deliveryPrices = [
        'Kyiv' => 80,
        'Lviv' => 105,
        'Odesa' => 85,
        'Kharkiv' => 35,
    ];

    public function calculateCost(string $city): int
    {
        if (array_key_exists($city, $this->deliveryPrices)) {
            return $this->deliveryPrices[$city];
        }
        throw new Error("Invalid city");
    }
}