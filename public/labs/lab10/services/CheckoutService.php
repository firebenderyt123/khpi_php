<?php

namespace Lab10\services;

use Lab10\classes\CheckboxField;
use Lab10\classes\CheckoutMediator;
use Lab10\classes\DeliveryDate;
use Lab10\classes\DeliveryTime;
use Lab10\classes\RecipientInfo;

class CheckoutService
{
    public function getCheckoutMediator(array $availableTimes): CheckoutMediator
    {
        $mediator = new CheckoutMediator();
        $deliveryDate = new DeliveryDate($mediator);
        $deliveryTime = new DeliveryTime($availableTimes);
        $recipientCheckbox = new CheckboxField($mediator);
        $recipientInfo = new RecipientInfo();
        $pickupCheckbox = new CheckboxField($mediator);
        $mediator->setComponents($deliveryDate, $deliveryTime,
            $recipientCheckbox, $recipientInfo, $pickupCheckbox);
        return $mediator;
    }
}