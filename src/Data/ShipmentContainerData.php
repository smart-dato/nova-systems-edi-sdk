<?php

namespace SmartDato\NovaSystemsEdi\Data;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapOutputName(StudlyCaseMapper::class)]
class ShipmentContainerData extends Data
{
    public function __construct(
        public string $containerType,
        public ?int $containerQty = null,
    ) {}
}
