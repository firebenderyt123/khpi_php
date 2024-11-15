class BaseField
{
    constructor(visible)
    {
        this._visible = visible;
    }

    setVisible(visible)
    {
        this._visible = visible;
    }

    isVisible = () => this._visible;
}