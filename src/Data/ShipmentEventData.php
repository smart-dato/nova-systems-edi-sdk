<?php

namespace SmartDato\NovaSystemsEdi\Data;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapOutputName(StudlyCaseMapper::class)]
class ShipmentEventData extends Data
{
    public function __construct(
        public string $eventCode,
        public ?int $eventQty = null,
    ) {}
}
