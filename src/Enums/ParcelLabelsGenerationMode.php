<?php

namespace SmartDato\NovaSystemsEdi\Enums;

enum ParcelLabelsGenerationMode: string
{
    case NoPrint = 'NoPrint';
    case ZplOneForEachLabel = 'ZplOneForEachLabel';
    case ZplGrouped = 'ZplGrouped';
    case PdfOneForEachLabel = 'PdfOneForEachLabel';
    case PdfGrouped = 'PdfGrouped';
}
