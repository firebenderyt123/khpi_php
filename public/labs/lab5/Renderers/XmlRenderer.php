<?php

namespace Lab5\Renderers;

class XmlRenderer extends Renderer
{

    public function renderTitle(string $title, int $hNum = 1): string
    {
        return "<title level=\"{$this->getH($hNum)}\">$title</title>";
    }

    public function renderTextBlock(string $text, array $options = []): string
    {
        $allowedAttributes = $this->textBlockSettings($options);
        $attributes = $this->getStringAttributes($allowedAttributes);
        return "<text $attributes>$text</text>";
    }

    public function renderImage(string $src, array $options = []): string
    {
        $allowedAttributes = $this->imageSettings($options);
        $attributes = $this->getStringAttributes($allowedAttributes);
        return "<image src=\"$src\" $attributes/>";
    }

    public function renderParts(array $parts): string
    {
        return "<content>" . implode('', $parts) . "</content>";
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