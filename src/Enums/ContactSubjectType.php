<?php

namespace SmartDato\NovaSystemsEdi\Enums;

enum ContactSubjectType: string
{
    case Sender = 'Sender';
    case Commissioner = 'Commissioner';
    case Consignee = 'Consignee';
}
