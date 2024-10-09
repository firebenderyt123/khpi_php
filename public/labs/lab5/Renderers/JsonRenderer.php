<?php

namespace Lab5\Renderers;

class JsonRenderer extends Renderer
{

    public function renderTitle(string $title, int $hNum = 1): string
    {
        return "{\"tag\":\"{$this->getH($hNum)}\",\"text\":\"$title\"}";
    }

    public function renderTextBlock(string $text, array $attrs = []): string
    {
        $allowedAttributes = $this->textBlockSettings($attrs);
        $attributes = $this->getStringAttributes($allowedAttributes);
        return "{\"tag\":\"p\",\"text\":\"{$text}\"{$attributes}}";
    }

    public function renderImage(array $attrs): string
    {
        $allowedAttributes = $this->imageSettings($attrs);
        $attributes = $this->getStringAttributes($allowedAttributes);
        return "{\"tag\":\"img\"{$attributes}}";
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
        return $attributes ? ",\"attributes\":{{$attributes}}" : '';
    }
}