<?php

namespace Lab5\Renderers;

class HTMLRenderer extends Renderer
{

    public function renderTitle(string $title, int $hNum = 1): string
    {
        return "<{$this->getH($hNum)}>{$title}</{$this->getH($hNum)}>";
    }

    public function renderTextBlock(string $text, array $options = []): string
    {
        $allowedAttributes = $this->textBlockSettings($options);
        $attributes = $this->getStringAttributes($allowedAttributes);
        return "<p {$attributes}>{$text}</p>";
    }

    public function renderImage(string $src, array $options = []): string
    {
        $allowedAttributes = $this->imageSettings($options);
        $attributes = $this->getStringAttributes($allowedAttributes);
        return "<img src=\"{$src}\" {$attributes} />";
    }

    public function renderParts(array $parts): string
    {
        return implode($parts);
    }

    private function getStringAttributes(array $settings): string
    {
        $attributes = '';
        foreach ($settings as $key => $value) {
            $attributes .= "$key=\"$value\" ";
        }
        return $attributes;
    }
}