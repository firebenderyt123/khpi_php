<?php

namespace Lab5\Renderers;

use Lab5\Renderers\Interfaces\RendererInterface;

abstract class Renderer implements RendererInterface
{
    protected function imageSettings(array $options): array
    {
        $defaults = [
            'alt' => '',
            'title' => '',
            'width' => 'auto',
            'height' => 'auto',
        ];
        $allowedOptions = array_intersect_key($options, $defaults);
        return array_merge($defaults, $allowedOptions);
    }

    protected function getH(int $hNum)
    {
        return "h" . (($hNum > 6) ? 6 : (($hNum < 1) ? 1 : $hNum));
    }
}