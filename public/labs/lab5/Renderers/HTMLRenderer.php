<?php

namespace Lab5\Renderers;

class HTMLRenderer extends Renderer
{

    public function renderTitle(string $title, int $hNum = 1): string
    {
        return "<{$this->getH($hNum)}>{$title}</{$this->getH($hNum)}>";
    }

    public function renderTextBlock(string $text): string
    {
        return "<p>{$text}</p>";
    }

    public function renderImage(string $src, array $options = []): string
    {
        $attributes = '';
        foreach ($this->imageSettings($options) as $key => $value) {
            $attributes .= "$key=\"$value\" ";
        }

        return "<img src=\"{$src}\" {$attributes} />";
    }

    public function renderParts(array $parts): string
    {
        return implode($parts);
    }
}