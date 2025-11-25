<?php

namespace SmartDato\NovaSystemsEdi\Data;

use SmartDato\NovaSystemsEdi\Enums\SizeUnitOfMeasure;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapOutputName(StudlyCaseMapper::class)]
class ShipmentGoodDetailSizeData extends Data
{
    public function __construct(
        public int $packages,
        public ?SizeUnitOfMeasure $sizeUM = null,
        public ?float $sizeLength = null,
        public ?float $sizeWidth = null,
        public ?float $sizeHeight = null,
        public ?float $grossWeight = null,
        public ?bool $areStackableGoods = null,
    ) {}
}
