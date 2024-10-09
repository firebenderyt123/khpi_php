<?php

namespace Lab5\Pages;

use Lab5\Products\ProductInterface;
use Lab5\Renderers\Interfaces\RendererInterface;

class ProductPage extends Page
{

    private readonly ProductInterface $product;

    public function __construct(RendererInterface $renderer,
                                ProductInterface $product)
    {
        parent::__construct($renderer);
        $this->product = $product;
    }

    public function view(): string
    {
        $imageSrc = $this->product->getImageSrc();
        return $this->renderer->renderParts([
            $this->renderer->renderImage([
                    "src" => $imageSrc,
                    "alt" => pathinfo($imageSrc, PATHINFO_FILENAME),
                    "width" => "250px",
                    "height" => "250px"
                ]),
            $this->renderer->renderTextBlock($this->product->getId(),
                ["style" => "color:grey;font-size:9px"]),
            $this->renderer->renderTitle($this->product->getName()),
            $this->renderer->renderTextBlock($this->product->getDescription(),
                ["class" => "product-description"]),
        ]);
    }
}