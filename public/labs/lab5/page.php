<?php

require __DIR__ . '/../../../vendor/autoload.php';

use Lab5\Pages\SimplePage;
use Lab5\Pages\ProductPage;
use Lab5\Products\Product;

use Lab5\Renderers\Interfaces\RendererInterface;
use Lab5\Renderers\HTMLRenderer;
use Lab5\Renderers\JsonRenderer;
use Lab5\Renderers\XmlRenderer;

$pages = [
    'simple' => 'simplePage',
    'product' => 'productPage'
];

$renderers = [
    'html' => 'htmlRenderer',
    'json' => 'jsonRenderer',
    'xml' => 'xmlRenderer'
];

$renderer = htmlRenderer();

if (isset($_GET['page'])) {
    $file = $_GET['page'];

    $pageName = strtolower((string) pathinfo($file, PATHINFO_FILENAME));
    $extension = strtolower((string) pathinfo($file, PATHINFO_EXTENSION));

    if (array_key_exists($extension, $renderers))
    {
        $renderer = $renderers[$extension]();
    }

    if (!array_key_exists($pageName, $pages))
    {
        $page = simplePage($renderer);
    }
    else
    {
        $page = $pages[$pageName]($renderer);
    }
}
else
{
    $page = simplePage($renderer);
}
echo $page->view();

function simplePage(RendererInterface $renderer): SimplePage
{
    return new SimplePage($renderer, "Main page", "It's a simple page.");
}

function productPage(RendererInterface $renderer): ProductPage
{
    $product = new Product(
        "0000-0000-0000-0000",
        "Mango",
        "Enjoy the sweetness of summer in every bite, making them the perfect addition to your meals or a delightful snack any time of the day. Treat yourself to the taste of paradise with our Juicy Mango!",
        "mango.webp"
    );
    return new ProductPage($renderer, $product);
}

function htmlRenderer(): HTMLRenderer
{
    return new HTMLRenderer();
}

function jsonRenderer(): JsonRenderer
{
    header('Content-Type: application/json');
    return new JsonRenderer();
}

function xmlRenderer(): XmlRenderer
{
    header('Content-Type: application/xml');
    return new XmlRenderer();
}
