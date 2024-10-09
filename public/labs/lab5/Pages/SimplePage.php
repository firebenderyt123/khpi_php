<?php

namespace Lab5\Pages;

use Lab5\Renderers\Interfaces\RendererInterface;

class SimplePage extends Page
{
    private readonly string $title;
    private readonly string $content;

    public function __construct(RendererInterface $renderer,
                                string $title, string $content)
    {
        parent::__construct($renderer);
        $this->title = $title;
        $this->content = $content;
    }

    public function view(): string
    {
        return $this->renderer->renderParts([
            $this->renderer->renderTitle($this->title),
            $this->renderer->renderTextBlock($this->content)
        ]);
    }
}