<?php

namespace Lab7\classes;

use Lab7\interfaces\DeliveryContextInterface;

class Order
{
    private DeliveryContextInterface $deliveryContext;
    private array $items;
    private string $city;
    private int $discountPercent;

    public function __construct(DeliveryContextInterface $deliveryContext,
                                array $items,
                                string $city = '',
                                $discountPercent = 0)
    {
        $this->deliveryContext = $deliveryContext;
        $this->items = $items;
        $this->city = $city;
        $this->discountPercent = $discountPercent;
    }

    public function calcPrices(): array
    {
        $totalProducts = $this->calcProductsPrice();
        $discount = $this->calcDiscount($totalProducts);
        $delivery = $this->calcDelivery();
        $totalPrice = $totalProducts - $discount + $delivery;

        return array(
            'products' => $totalProducts,
            'delivery' => $delivery,
            'discount' => $discount,
            'total' => $totalPrice
        );
    }

    private function calcProductsPrice(): float
    {
        $totalProducts = 0;
        foreach ($this->items as $item) {
            $totalProducts += $item['product']->getPrice() * $item['count'];
        }
        return $totalProducts;
    }

    private function calcDelivery(): float
    {
        return $this->deliveryContext->calculateCost($this->city);
    }

    private function calcDiscount(float $totalPrice): float
    {
        if ($this->discountPercent > 0) {
            return $totalPrice * $this->discountPercent / 100;
        }
        return 0;
    }
}