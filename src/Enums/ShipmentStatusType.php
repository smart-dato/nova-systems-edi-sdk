<?php

namespace SmartDato\NovaSystemsEdi\Enums;

enum ShipmentStatusType: string
{
    case ToBeConfirmed = 'ToBeConfirmed';
    case Entered = 'Entered';
    case Confirmed = 'Confirmed';
    case InTransit = 'InTransit';
    case Delivered = 'Delivered';
    case Cancelled = 'Cancelled';
}
