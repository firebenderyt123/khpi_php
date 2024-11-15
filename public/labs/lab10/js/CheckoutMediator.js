class CheckoutMediator
{
    constructor()
    {
        this.deliveryDate = null;
        this.deliveryTime = null;
        this.recipientCheckbox = null;
        this.recipientInfo = null;
        this.pickupCheckbox = null;
    }

    setComponents(deliveryDate, deliveryTime, recipientCheckbox, recipientInfo, pickupCheckbox)
    {
        this.deliveryDate = deliveryDate;
        this.deliveryTime = deliveryTime;
        this.recipientCheckbox = recipientCheckbox;
        this.recipientInfo = recipientInfo;
        this.pickupCheckbox = pickupCheckbox;
    }

    notify(sender, event) {
        if (this.deliveryDate.isModified(sender, event))
        {
            this.deliveryTime.updateTimeSlots(this.deliveryDate.getDate());
        }

        if (this.recipientCheckbox.isModified(sender, event)) {
            this.recipientInfo.setVisible(this.recipientCheckbox.isChecked());
        }

        if (this.pickupCheckbox.isModified(sender, event)) {
            const isChecked = this.pickupCheckbox.isChecked();
            this.deliveryDate.setVisible(!isChecked);
            this.deliveryTime.setVisible(!isChecked);
        }
    }
}