<?php

namespace SmartDato\NovaSystemsEdi\Enums;

enum ContactTitle: string
{
    case NotSelected = 'NotSelected';
    case Lawyer = 'Lawyer';
    case Doctor = 'Doctor';
    case Engineer = 'Engineer';
    case Mr = 'Mr';
    case Mrs = 'Mrs';
    case Miss = 'Miss';
    case Dr = 'Dr';
}
