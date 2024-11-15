class FieldWithMediator extends BaseField
{
    constructor(mediator, visible)
    {
        super(visible);
        this._mediator = mediator;
    }

    isModified(sender, event)
    {
        throw new Error('isModified method must be implemented by subclass');
    }

    _modified = (sender, event, cls, clsEvent) =>
        sender instanceof cls && event === clsEvent;
}