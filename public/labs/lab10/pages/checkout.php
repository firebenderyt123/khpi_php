<?php

namespace Lab10\pages;

session_start();

$scripts = ['constants',
    'BaseField',
    'FieldWithMediator',
    'DeliveryDate',
    'DeliveryTime',
    'CheckboxField',
    'RecipientInfo',
    'CheckoutMediator',
    'main'
];

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оформлення замовлення</title>
    <link rel="stylesheet" href="/labs/lab10/css/styles.css">
</head>
<body>

<h1>Оформлення замовлення квітів</h1>

<form method="POST" action="">
    <div id="delivery">
        <label for="deliveryDate">Дата доставки:</label>
        <input type="date" id="deliveryDate" name="deliveryDate" required>
        <br>

        <label for="deliveryTime">Час доставки:</label>
        <select id="deliveryTime" name="deliveryTime" required></select>
        <br>
    </div>

    <label for="recipientCheckbox">Отримувач - інша особа</label>
    <input type="checkbox" id="recipientCheckbox" name="recipientCheckbox">
    <br>

    <div id="recipientInfo" class="hidden">
        <label for="recipientName">Ім'я отримувача:</label>
        <input type="text" id="recipientName" name="recipientName">
        <br>
        <label for="recipientPhone">Телефон отримувача:</label>
        <input type="text" id="recipientPhone" name="recipientPhone">
        <br>
    </div>

    <label for="pickupCheckbox">Самовивіз з магазину</label>
    <input type="checkbox" id="pickupCheckbox" name="pickupCheckbox">
    <br>

    <button type="submit">Оформити замовлення</button>
</form>

<?php foreach ($scripts as $script): ?>
    <script src="/labs/lab10/js/<?= $script ?>.js" defer></script>
<?php endforeach; ?>
</body>
</html>