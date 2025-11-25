<?php

namespace SmartDato\NovaSystemsEdi\Enums;

enum DeliveryDateType: string
{
    case NoDeliveryPreference = 'NoDeliveryPreference';
    case LimitDate = 'LimitDate';
    case MandatoryDate = 'MandatoryDate';
}
