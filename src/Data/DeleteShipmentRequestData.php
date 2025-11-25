<?php

namespace SmartDato\NovaSystemsEdi\Data;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapOutputName(StudlyCaseMapper::class)]
class DeleteShipmentRequestData extends Data
{
    public function __construct(
        public string $interchangeToken,
        public string $serviceCode,
        public ?string $shipmentBranchCode = null,
        public ?int $shipmentYear = null,
        public ?int $shipmentProgr = null,
        public ?string $shipmentFullNumber = null,
    ) {}
}
