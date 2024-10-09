<?php

namespace Lab5\Renderers;

class JsonRenderer extends Renderer
{

    public function renderTitle(string $title, int $hNum = 1): string
    {
        return "{\"tag\":\"{$this->getH($hNum)}\",\"text\":\"$title\"}";
    }

    public function renderTextBlock(string $text, array $options = []): string
    {
        $allowedAttributes = $this->textBlockSettings($options);
        $attributes = $this->getStringAttributes($allowedAttributes);
        return "{\"tag\":\"p\",\"text\":\"{$text}\"{$attributes}}";
    }

    public function renderImage(string $src, array $options = []): string
    {
        $allowedAttributes = $this->imageSettings($options);
        $attributes = $this->getStringAttributes($allowedAttributes);
        return "{\"tag\":\"img\",\"src\":\"$src\"{$attributes}}";
    }

    public function renderParts(array $parts): string
    {
        return "[" . implode(",", $parts) . "]";
    }

    private function getStringAttributes(array $settings): string
    {
        $attributesArray = [];
        foreach ($settings as $key => $value) {
            $attributesArray[] = "\"$key\":\"$value\"";
        }
        $attributes = implode(",", $attributesArray);
        return $attributes ? ",{$attributes}" : '';
    }
}