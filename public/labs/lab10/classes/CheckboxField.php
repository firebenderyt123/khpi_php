<?php

namespace Lab10\classes;

use const Lab10\constants\TOGGLE_EVENT;

class CheckboxField extends BaseField
{
    protected bool $checked = false;

    public function toggle(): void
    {
        $this->checked = !$this->checked;
        $this->mediator->notify($this, TOGGLE_EVENT);
    }

    public function isChecked(): bool
    {
        return $this->checked;
    }

    public function isModified(object $sender, string $event): bool
    {
        return $this->modified($sender, $event, $this, TOGGLE_EVENT);
    }
}