<?php

namespace Lab10\classes;

use Lab10\interfaces\MediatorInterface;

abstract class BaseField
{
    protected MediatorInterface $mediator;

    public function __construct(MediatorInterface $mediator)
    {
        $this->mediator = $mediator;
    }

    abstract public function isModified(object $sender, string $event): bool;

    protected function modified(object $sender, string $event,
                                object $cls, string $clsEvent): bool
    {
        return $sender instanceof $cls && $event === $clsEvent;
    }
}