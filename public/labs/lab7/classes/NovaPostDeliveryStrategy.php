<?php

namespace Lab7\classes;

use Lab7\interfaces\DeliveryStrategyInterface;

class NovaPostDeliveryStrategy implements DeliveryStrategyInterface
{
    private array $deliveryPrices = [
        'Kyiv' => 40,
        'Lviv' => 65,
        'Odesa' => 75,
        'Kharkiv' => 55,
    ];

    public function calculateCost(string $city): int
    {
        if (array_key_exists($city, $this->deliveryPrices)) {
            return $this->deliveryPrices[$city];
        }
        throw new Error("Invalid city");
    }
}