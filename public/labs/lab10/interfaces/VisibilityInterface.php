<?php

namespace Lab10\interfaces;

interface VisibilityInterface
{
    public function setVisible(bool $visible): void;
    public function isVisible(): bool;
}