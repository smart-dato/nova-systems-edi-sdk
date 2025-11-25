<?php

namespace SmartDato\NovaSystemsEdi\Enums;

enum ShipmentPracticeType: string
{
    case None = 'None';
    case AirplaneDirect = 'AirplaneDirect';
    case AirplaneConsolidated = 'AirplaneConsolidated';
    case MaritimeFCL = 'MaritimeFCL';
    case MaritimeConsolidated = 'MaritimeConsolidated';
    case MaritimeHold = 'MaritimeHold';
    case RoadShipment = 'RoadShipment';
}
