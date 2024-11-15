<?php

namespace Lab10\classes;

use Lab10\interfaces\VisibilityInterface;

class RecipientInfo implements VisibilityInterface
{
    private string $name;
    private string $phone;
    private bool $visible = false;

    public function setVisible(bool $visible): void
    {
        $this->visible = $visible;
    }

    public function isVisible(): bool
    {
        return $this->visible;
    }

    public function setInfo(string $name, string $phone): void
    {
        $this->name = $name;
        $this->phone = $phone;
    }

    public function getInfo(): array
    {
        return ['name' => $this->name, 'phone' => $this->phone];
    }
}