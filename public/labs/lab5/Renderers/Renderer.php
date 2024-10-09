<?php

namespace Lab5\Renderers;

use Error;
use Lab5\Renderers\Interfaces\RendererInterface;

abstract class Renderer implements RendererInterface
{
    private readonly array $globalOptionsDefaults;
    private readonly array $imageDefaults;

    public function __construct()
    {
        $this->globalOptionsDefaults = [
            'id' => '',
            'class' => '',
            'style' => '',
        ];

        $this->imageDefaults = $this->addGlobalDefaults([
            'src' => '',
            'alt' => '',
            'title' => '',
            'width' => 'auto',
            'height' => 'auto',
        ]);
    }

    protected function textBlockSettings(array $options): array
    {
        return $this->applySettings($options, $this->globalOptionsDefaults);
    }

    protected function imageSettings(array $options): array
    {
        if (!array_key_exists("src", $options))
        {
            throw new Error("Image src required!");
        }
        return $this->applySettings($options, $this->imageDefaults);
    }

    protected function getH(int $hNum): string
    {
        return "h" . (($hNum > 6) ? 6 : (($hNum < 1) ? 1 : $hNum));
    }

    private function applySettings(array$options, array $defaults): array
    {
        $allowedOptions = array_intersect_key($options, $defaults);
        $mergedOptions = array_merge($defaults, $allowedOptions);
        return array_filter($mergedOptions, function ($value) {
            return !empty($value);
        });
    }

    private function addGlobalDefaults(array $defaults): array
    {
        return array_merge($this->globalOptionsDefaults, $defaults);
    }
}