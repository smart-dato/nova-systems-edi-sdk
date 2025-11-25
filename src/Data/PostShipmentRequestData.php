<?php

namespace SmartDato\NovaSystemsEdi\Data;

use SmartDato\NovaSystemsEdi\Enums\ParcelLabelsGenerationMode;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapOutputName(StudlyCaseMapper::class)]
class PostShipmentRequestData extends Data
{
    /**
     * @param  array<DocumentAttachmentData>|null  $documentAttachments
     */
    public function __construct(
        public string $interchangeToken,
        public ShipmentData $shipmentData,
        public ParcelLabelsGenerationMode $parcelLabelsGenerationMode,
        #[DataCollectionOf(DocumentAttachmentData::class)]
        public ?array $documentAttachments = null,
        public ?float $parcelLabelsRenderingWidthInches = null,
        public ?float $parcelLabelsRenderingHeightInches = null,
    ) {}
}
