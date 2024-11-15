class DeliveryTime extends BaseField
{
    constructor(availableTimes, visible)
    {
        super(visible);
        this._options = [];
        this._availableTimes = availableTimes;
    }

    updateTimeSlots(date)
    {
        this._options = this._availableTimes[date] || [];
    }

    getOptions = ()=> this._options;
}