<?php

namespace SmartDato\NovaSystemsEdi\Data;

use DateTime;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapOutputName(StudlyCaseMapper::class)]
class DocumentAttachmentData extends Data
{
    public function __construct(
        public string $documentContentExtension,
        public string $documentContent,
        public string $documentNumber,
        public DateTime $documentDate,
        public ?string $documentDescription = null,
        public ?string $documentType = null,
    ) {}
}
