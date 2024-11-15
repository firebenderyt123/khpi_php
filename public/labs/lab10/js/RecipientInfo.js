class RecipientInfo extends BaseField
{
    constructor(visible)
    {
        super(visible);
        this._name = '';
        this._phone = '';
    }

    setInfo(name, phone)
    {
        this._name = name;
        this._phone = phone;
    }

    getInfo = () =>
        ({ name: this._name, phone: this._phone });
}
