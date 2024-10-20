<?php

namespace Lab5\Pages;

use Lab5\Renderers\Interfaces\RendererInterface;

abstract class Page
{
    protected RendererInterface $renderer;

    public function __construct(RendererInterface $renderer)
    {
        $this->setRenderer($renderer);
    }

    public function setRenderer(RendererInterface $renderer): void
    {
        $this->renderer = $renderer;
    }

    abstract public function view(): string;
}