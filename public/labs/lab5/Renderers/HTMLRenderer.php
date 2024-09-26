<?php

namespace Lab5\Renderers;

class HTMLRenderer extends Renderer
{

    public function renderTitle(string $title, int $hNum = 1): string
    {
        $hNum = ($hNum > 6) ? 6 : (($hNum < 1) ? 1 : $hNum);
        return "<h{$hNum}>{$title}</h{$hNum}>";
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