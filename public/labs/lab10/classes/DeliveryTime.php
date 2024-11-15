<?php

namespace Lab10\classes;

class DeliveryTime
{
    protected array $options;
    protected array $availableTimes;

    public function __construct(array $availableTimes)
    {
        $this->options = [];
        $this->availableTimes = $availableTimes;
    }

    public function updateTimeSlots(string $date): void
    {
        $this->options = $this->availableTimes[$date] ?? [];
    }
    public function getOptions(): array
    {
        return $this->options;
    }
}