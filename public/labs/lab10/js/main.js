const today = new Date();
const tomorrow = new Date(today);
tomorrow.setDate(tomorrow.getDate() + 1);
const todayDate = today.toISOString().split('T')[0];
const tomorrowDate = tomorrow.toISOString().split('T')[0];

const mediator = new CheckoutMediator();

const deliveryDate = new DeliveryDate(mediator);
const deliveryTime = new DeliveryTime({
    [todayDate]: ['09:00-11:00', '11:00-13:00'],
    [tomorrowDate]: ['14:00-16:00', '16:00-18:00']
});
const recipientCheckbox = new CheckboxField(mediator);
const recipientInfo = new RecipientInfo();
const pickupCheckbox = new CheckboxField(mediator);

mediator.setComponents(deliveryDate, deliveryTime,
    recipientCheckbox, recipientInfo, pickupCheckbox);

document.addEventListener('DOMContentLoaded', function () {
    const deliveryElement = document.getElementById("delivery");
    const deliveryDateElement = document.getElementById('deliveryDate');
    const deliveryTimeElement = document.getElementById('deliveryTime');
    const recipientCheckboxElement = document.getElementById('recipientCheckbox');
    const recipientInfoElement = document.getElementById('recipientInfo');
    const pickupCheckboxElement = document.getElementById('pickupCheckbox');

    deliveryDateElement.addEventListener('change', (e) =>
    {
        deliveryDate.setDate(e.target.value);
        const options = deliveryTime.getOptions();
        deliveryTimeElement.innerHTML = '';
        options.forEach(time => {
            const option = document.createElement('option');
            option.value = time;
            option.textContent = time;
            deliveryTimeElement.appendChild(option);
        });
    });

    recipientCheckboxElement.addEventListener('change', (e) => {
        recipientCheckbox.toggle();
        const checked = recipientCheckbox.isChecked();
        recipientInfoElement.classList.toggle('hidden', !checked);

        const inputs = recipientInfoElement.querySelectorAll("input");
        for (const input of inputs) {
            input.toggleAttribute("required", checked);
        }
    });

    pickupCheckboxElement.addEventListener('change', () => {
        pickupCheckbox.toggle();
        const checked = pickupCheckbox.isChecked();
        deliveryElement.classList.toggle('hidden', checked);

        deliveryDateElement.toggleAttribute("required", !checked);
        deliveryTimeElement.toggleAttribute("required", !checked);
    });
});