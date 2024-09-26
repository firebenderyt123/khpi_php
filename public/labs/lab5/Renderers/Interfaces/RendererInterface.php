<?php

namespace Lab5\Renderers\Interfaces;

interface RendererInterface
{
    public function renderTitle(string $title, int $hNum): string;

    public function renderTextBlock(string $text): string;

    public function renderImage(string $src, array $options): string;
    public function renderParts(array $parts): string;
}