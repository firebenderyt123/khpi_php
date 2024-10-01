<?php

namespace Lab5\Renderers;

class JsonRenderer extends Renderer
{

    public function renderTitle(string $title, int $hNum = 1): string
    {
        return "\"title\":{\"name\":\"$title\",\"tag\":\"{$this->getH($hNum)}\"}";
    }

    public function renderTextBlock(string $text): string
    {
        return "\"p\":\"{$text}\"";
    }

    public function renderImage(string $src, array $options): string
    {
        $attributes = '';
        foreach ($this->imageSettings($options) as $key => $value) {
            $attributes .= "\"$key\":\"$value\",";
        }
        return "\"img\":{\"src\":\"$src\",\"attributes\":{$attributes}}";
    }

    public function renderParts(array $parts): string
    {
        return "{" . implode(",", $parts) . "}";
    }
}