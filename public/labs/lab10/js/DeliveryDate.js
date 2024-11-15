class DeliveryDate extends FieldWithMediator
{
    constructor(mediator, visible)
    {
        super(mediator, visible);
        this._date = '';
    }

    setDate(date)
    {
        this._date = date;
        this._mediator.notify(this, CHANGE_EVENT);
    }

    getDate = () => this._date;

    isModified = (sender, event) =>
        this._modified(sender, event, DeliveryDate, CHANGE_EVENT);
}