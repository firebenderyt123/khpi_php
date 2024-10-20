<?php

require __DIR__ . '/../../../vendor/autoload.php';

use Lab7\classes\DeliveryContext;
use Lab7\classes\Cart;
use Lab7\classes\Product;
use Lab7\classes\Order;
use Lab7\classes\PickupStrategy;
use Lab7\classes\NovaPostDeliveryStrategy;
use Lab7\classes\OwnDeliveryStrategy;

$product1 = new Product(1, 'Суші', 'Опис', 120);
$product2 = new Product(2, 'Піца','', 225);

$cart = new Cart();
$cart->addToCart($product1, 2);
$cart->addToCart($product2, 6);
$products = $cart->getItems();

include("form.html");

$city = $_POST['city'] ?? '';
$delivery_method = $_POST['delivery_method'] ?? null;

if (isset($delivery_method)):

$deliveryContext = new DeliveryContext();

switch ($delivery_method) {
    case 'pickup':
        $deliveryContext->setStrategy(new PickupStrategy());
        break;
    case 'nova':
        $deliveryContext->setStrategy(new NovaPostDeliveryStrategy());
        break;
    case 'own':
        $deliveryContext->setStrategy(new OwnDeliveryStrategy());
        break;
}

$discountPercent = 10;
$order = new Order($deliveryContext, $products, $city, $discountPercent);
$prices = $order->calcPrices();
$cart->clearCart();
?>

<p>Ціна за їжу (грн): <?= $prices['products'] ?></p>
<p>Знижка (грн): <?= $prices['discount'] ?></p>
<p>Доставка (грн): <?= $prices['delivery'] ?></p>
<p>Усього (грн): <?= $prices['total'] ?></p>

<?php endif; ?>

<pre><?php var_dump($cart->getItems()); ?></pre>