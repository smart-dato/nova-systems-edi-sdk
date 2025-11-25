<?php

namespace SmartDato\NovaSystemsEdi\Data;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapOutputName(StudlyCaseMapper::class)]
class ShipmentGoodDetailData extends Data
{
    /**
     * @param  array<ShipmentGoodDetailSizeData>|null  $sizes
     */
    public function __construct(
        public int $packages,
        public ?string $productClassCode = null,
        public ?string $goodsDescription = null,
        public ?string $goodsAppearanceCode = null,
        public ?float $grossWeight = null,
        public ?float $cubeMeters = null,
        public ?float $linearMeters = null,
        public ?float $goodsValue = null,
        public ?string $goodsValueCurrencyCode = null,
        #[DataCollectionOf(ShipmentGoodDetailSizeData::class)]
        public ?array $sizes = null,
    ) {}
}
