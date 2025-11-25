<?php

namespace SmartDato\NovaSystemsEdi\Data;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapOutputName(StudlyCaseMapper::class)]
class SubjectData extends Data
{
    public function __construct(
        public string $zipCode,
        public string $city,
        public string $countryCode,
        public string $address,
        public string $address2,
        public ?string $companyName = null,
        public ?string $furtherCompanyName = null,
        public ?string $province = null,
        public ?float $geocodeLatitude = null,
        public ?float $geocodeLongitude = null,
    ) {}
}
