<?php

namespace Lab10\classes;

use const Lab10\constants\CHANGE_EVENT;

class DeliveryDate extends BaseField
{
    private string $date;

    public function setDate($date): void
    {
        $this->date = $date;
        $this->mediator->notify($this, CHANGE_EVENT);
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function isModified(object $sender, string $event): bool
    {
        return $this->modified($sender, $event, $this, CHANGE_EVENT);
    }
}