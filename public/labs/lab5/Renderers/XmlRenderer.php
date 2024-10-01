<?php

namespace Lab5\Renderers;

class XmlRenderer extends Renderer
{

    public function renderTitle(string $title, int $hNum = 1): string
    {
        return "<title level=\"{$this->getH($hNum)}\">$title</title>";
    }

    public function renderTextBlock(string $text): string
    {
        return "<text>$text</text>";
    }

    public function renderImage(string $src, array $options): string
    {
        $attributes = '';
        foreach ($options as $key => $value) {
            $attributes .= "$key=\"$value\" ";
        }
        return "<image src=\"$src\" $attributes/>";
    }

    public function renderParts(array $parts): string
    {
        return "<content>" . implode('', $parts) . "</content>";
    }
}