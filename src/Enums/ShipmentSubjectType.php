<?php

namespace SmartDato\NovaSystemsEdi\Enums;

enum ShipmentSubjectType: string
{
    case Commissioner = 'Commissioner';
    case Sender = 'Sender';
    case CollectionLocation = 'CollectionLocation';
    case Consignee = 'Consignee';
    case DeliveryLocation = 'DeliveryLocation';
}
