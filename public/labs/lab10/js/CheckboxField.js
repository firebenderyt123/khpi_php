class CheckboxField extends FieldWithMediator
{
    constructor(mediator, visible)
    {
        super(mediator, visible);
        this._checked = false;
    }

    toggle()
    {
        this._checked = !this._checked;
        this._mediator.notify(this, TOGGLE_EVENT);
    }

    isChecked = () => this._checked;

    isModified = (sender, event) =>
        this._modified(sender, event, CheckboxField, TOGGLE_EVENT);
}