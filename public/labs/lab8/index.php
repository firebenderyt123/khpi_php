<?php

require __DIR__ . '/../../../vendor/autoload.php';

use Lab8\classes\APIController;

header('Content-type: text/javascript');

$apiController = new APIController();

function printJSON(array $obj): void
{
    echo json_encode($obj, JSON_PRETTY_PRINT);
}

$order = $apiController->getDataEntity('orders', 13);
printJSON($order);

$order = $apiController->getDataEntity('order', 3);
printJSON($order);

$order = $apiController->getDataEntity('order', 2);
printJSON($order);

$product = $apiController->getDataEntity('product', 1);
printJSON($product);

$user = $apiController->getDataEntity('user', 2);
printJSON($user);

$newOrder = $apiController->updateEntity('order', [
    "haha" => "Invalid data"
]);
printJSON($newOrder);

$newOrder = $apiController->updateEntity('order', [
    "id" => "Invalid data"
]);
printJSON($newOrder);

$newOrder = $apiController->updateEntity('order', [
    "id" => 1,
    "item" => "Modified Item",
    "quantity" => 12
]);
printJSON($newOrder);

$newProduct = $apiController->updateEntity('product', [
    "id" => 1,
    "price" => -1
]);
printJSON($newProduct);

$newProduct = $apiController->updateEntity('product', [
    "id" => 1,
    "price" => 10
]);
printJSON($newProduct);

$newUser = $apiController->updateEntity('user', [
    "id" => 1,
    "email" => "new.email@example.com"
]);
printJSON($newUser);

$newUser = $apiController->updateEntity('user', [
    "id" => 1,
    "name" => "Noname"
]);
printJSON($newUser);

$newUser = $apiController->getDataEntity('user', 1);
printJSON($newUser);