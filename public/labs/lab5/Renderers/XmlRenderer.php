<?php

namespace Lab5\Renderers;

class XmlRenderer extends Renderer
{

    public function renderTitle(string $title, int $hNum = 1): string
    {
        return "<title level=\"{$this->getH($hNum)}\">$title</title>";
    }

    public function renderTextBlock(string $text, array $attrs = []): string
    {
        $allowedAttributes = $this->textBlockSettings($attrs);
        $attributes = $this->getStringAttributes($allowedAttributes);
        return "<text $attributes>$text</text>";
    }

    public function renderImage(array $attrs): string
    {
        $allowedAttributes = $this->imageSettings($attrs);
        $attributes = $this->getStringAttributes($allowedAttributes);
        return "<image $attributes/>";
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