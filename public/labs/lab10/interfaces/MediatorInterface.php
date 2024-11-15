<?php

namespace Lab10\interfaces;

interface MediatorInterface
{
    public function notify(object $sender, string $event): void;
}