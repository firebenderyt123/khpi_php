<?php

namespace Lab7\classes;

use Error;
use Lab7\interfaces\ProductInterface;

class Cart
{
    private array $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function addToCart(ProductInterface $product, int $count): void
    {
        $availableCount = $product->getAvailableCount();

        if ($availableCount !== -1 && $availableCount < $count)
            throw new Error("Cannot add to cart more than we have");

        if ($availableCount !== -1)
            $product->setAvailableCount($availableCount - $count);

        $this->items[] = array(
            'product' => $product,
            'count' => $count
        );
    }

    public function removeFromCart(int $id): void
    {
        $this->items = array_filter($this->items, function ($item) use ($id) {
            $willRemove = $item['product']->id === $id;
            $count = $item['product']->getAvailableCount();

            if ($willRemove && $count !== -1)
                $item['product']->setAvailableCount($count + $item['count']);

            return !$willRemove;
        });
        $this->items = array_values($this->items);
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function clearCart(): void
    {
        $this->items = [];
    }
}