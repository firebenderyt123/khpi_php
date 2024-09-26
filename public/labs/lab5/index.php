<?php

require __DIR__ . '/../../../vendor/autoload.php';

use Lab5\Pages\SimplePage;
use Lab5\Renderers\HTMLRenderer;
use Lab5\Renderers\JsonRenderer;
use Lab5\Renderers\XmlRenderer;

$htmlRenderer = new HTMLRenderer();
$jsonRenderer = new JsonRenderer();
$xmlRenderer = new XmlRenderer();

$page = new SimplePage($htmlRenderer, "Main page", "It's a simple page.");
echo $page->view();

$page->setRenderer($jsonRenderer);
echo "<pre>" . print_r(json_decode($page->view()), true) . "</pre>";

$page->setRenderer($xmlRenderer);
$page->view();