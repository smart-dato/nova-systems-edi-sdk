<?php

namespace SmartDato\NovaSystemsEdi\Data;

use SmartDato\NovaSystemsEdi\Enums\ContactSubjectType;
use SmartDato\NovaSystemsEdi\Enums\ContactTitle;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapOutputName(StudlyCaseMapper::class)]
class ShipmentContactData extends Data
{
    public function __construct(
        public ContactSubjectType $subjectType,
        public ContactTitle $title,
        public string $name,
        public ?string $surname = null,
        public ?string $phoneNumber = null,
        public ?string $mobileNumber = null,
        public ?string $languageCode = null,
        public ?string $emailAddress = null,
        public ?bool $sendFSUNotificationEmail = null,
    ) {}
}
