<?php

namespace Lab10\classes;

use Lab10\interfaces\MediatorInterface;

class CheckoutMediator implements MediatorInterface
{
    private DeliveryDate $deliveryDate;
    private DeliveryTime $deliveryTime;
    private CheckboxField $recipientCheckbox;
    private RecipientInfo $recipientInfo;
    private CheckboxField $pickupCheckbox;

    public function setComponents(DeliveryDate $deliveryDate,
                                  DeliveryTime $deliveryTime,
                                  CheckboxField $recipientCheckbox,
                                  RecipientInfo $recipientInfo,
                                  CheckboxField $pickupCheckbox): void
    {
        $this->deliveryDate = $deliveryDate;
        $this->deliveryTime = $deliveryTime;
        $this->recipientCheckbox = $recipientCheckbox;
        $this->recipientInfo = $recipientInfo;
        $this->pickupCheckbox = $pickupCheckbox;
    }

    public function notify(object $sender, string $event): void
    {
        if ($this->deliveryDate->isModified($sender, $event)) {
            $this->deliveryTime->updateTimeSlots($this->deliveryDate->getValue());
        }

        if ($this->recipientCheckbox->isModified($sender, $event)) {
            $this->recipientInfo->setVisible($this->recipientCheckbox->isChecked());
        }
    }

    public function getDeliveryDate(): DeliveryDate
    {
        return $this->deliveryDate;
    }

    public function getDeliveryTime(): DeliveryTime
    {
        return $this->deliveryTime;
    }

    public function getRecipientCheckbox(): CheckboxField
    {
        return $this->recipientCheckbox;
    }

    public function getRecipientInfo(): RecipientInfo
    {
        return $this->recipientInfo;
    }

    public function getPickupCheckbox(): CheckboxField
    {
        return $this->pickupCheckbox;
    }
}