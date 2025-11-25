<?php

namespace SmartDato\NovaSystemsEdi\Data;

use DateTime;
use SmartDato\NovaSystemsEdi\Enums\DeliveryDateType;
use SmartDato\NovaSystemsEdi\Enums\ShipmentPracticeType;
use SmartDato\NovaSystemsEdi\Enums\ShipmentStatusType;
use SmartDato\NovaSystemsEdi\Enums\ShipmentSubjectType;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapOutputName(StudlyCaseMapper::class)]
class ShipmentData extends Data
{
    /**
     * @param  array<ShipmentGoodDetailData>|null  $goodsDetails
     * @param  array<ShipmentContainerData>|null  $containers
     * @param  array<ShipmentEventData>|null  $events
     * @param  array<ShipmentContactData>|null  $contacts
     */
    public function __construct(
        // Required fields
        public string $serviceCode,
        public ShipmentPracticeType $shipmentPracticeType,
        public DeliveryDateType $deliveryRequestType,
        public string $senderReferenceNumber,

        // Edit shipment fields (for updates)
        public ?string $editShipmentBranchCode = null,
        public ?int $editShipmentYear = null,
        public ?int $editShipmentProgr = null,
        public ?string $editShipmentFullNumber = null,

        // Caller and branch
        public ?ShipmentSubjectType $callerSubjectType = null,
        public ?string $branchCode = null,

        // Shipment date and status
        public ?DateTime $shipmentDate = null,
        public ?ShipmentStatusType $shipmentStatus = null,

        // Transport and incoterms
        public ?string $transportIncotermsCode = null,

        // Commissioner reference
        public ?string $commissionerReferenceNumber = null,
        public ?DateTime $commissionerReferenceDate = null,
        public ?string $commissionerDocumentCode = null,

        // Sender
        public ?SubjectData $sender = null,
        public ?DateTime $senderReferenceDate = null,
        public ?string $senderDocumentCode = null,

        // Collection location
        public ?SubjectData $collectionLocation = null,

        // Consignee
        public ?SubjectData $consignee = null,
        public ?string $consigneeReferenceNumber = null,
        public ?DateTime $consigneeReferenceDate = null,
        public ?string $consigneeDocumentCode = null,

        // Delivery location
        public ?SubjectData $deliveryLocation = null,

        // Airports (IATA codes)
        public ?string $departureAirportID = null,
        public ?string $arrivalAirportID = null,
        public ?string $destinationAirportID = null,

        // Ports (UN/LOCODE)
        public ?string $embarkationPortID = null,
        public ?string $arrivalPortID = null,
        public ?string $landingPortID = null,

        // Collection and delivery
        public ?bool $isGoodsCollectionRequested = null,
        public ?DateTime $collectionRequestDateTime = null,
        public ?DateTime $deliveryRequestDateTime = null,

        // Parcel labels
        public ?float $parcelLabelQuantity = null,

        // Pallet
        public ?string $palletTypeCode = null,
        public ?int $palletQuantity = null,

        // Cash on delivery
        public ?string $cashOnDeliveryCurrencyCode = null,
        public ?float $cashOnDeliveryAmount = null,
        public ?string $cashOnDeliveryTypeCode = null,

        // Notes
        public ?string $collectionNotes = null,
        public ?string $deliveryNotes = null,

        // Collections
        #[DataCollectionOf(ShipmentGoodDetailData::class)]
        public ?array $goodsDetails = null,

        #[DataCollectionOf(ShipmentContainerData::class)]
        public ?array $containers = null,

        #[DataCollectionOf(ShipmentEventData::class)]
        public ?array $events = null,

        #[DataCollectionOf(ShipmentContactData::class)]
        public ?array $contacts = null,
    ) {}
}
