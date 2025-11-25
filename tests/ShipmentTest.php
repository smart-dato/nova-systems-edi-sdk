<?php

use SmartDato\NovaSystemsEdi\Data\DeleteShipmentRequestData;
use SmartDato\NovaSystemsEdi\Data\DocumentAttachmentData;
use SmartDato\NovaSystemsEdi\Data\PostShipmentRequestData;
use SmartDato\NovaSystemsEdi\Data\ShipmentContactData;
use SmartDato\NovaSystemsEdi\Data\ShipmentContainerData;
use SmartDato\NovaSystemsEdi\Data\ShipmentData;
use SmartDato\NovaSystemsEdi\Data\ShipmentEventData;
use SmartDato\NovaSystemsEdi\Data\ShipmentGoodDetailData;
use SmartDato\NovaSystemsEdi\Data\ShipmentGoodDetailSizeData;
use SmartDato\NovaSystemsEdi\Data\SubjectData;
use SmartDato\NovaSystemsEdi\Enums\ContactSubjectType;
use SmartDato\NovaSystemsEdi\Enums\ContactTitle;
use SmartDato\NovaSystemsEdi\Enums\DeliveryDateType;
use SmartDato\NovaSystemsEdi\Enums\ParcelLabelsGenerationMode;
use SmartDato\NovaSystemsEdi\Enums\ShipmentPracticeType;
use SmartDato\NovaSystemsEdi\Enums\ShipmentStatusType;
use SmartDato\NovaSystemsEdi\Enums\ShipmentSubjectType;
use SmartDato\NovaSystemsEdi\Enums\SizeUnitOfMeasure;
use SmartDato\NovaSystemsEdi\Requests\DeleteShipmentRequest;
use SmartDato\NovaSystemsEdi\Requests\PostShipmentRequest;

it('can create a PostShipmentRequestData with full example', function () {
    $requestData = new PostShipmentRequestData(
        interchangeToken: 'NEWABC123',
        shipmentData: new ShipmentData(
            serviceCode: '',
            shipmentPracticeType: ShipmentPracticeType::None,
            deliveryRequestType: DeliveryDateType::NoDeliveryPreference,
            senderReferenceNumber: 'string',
            editShipmentBranchCode: 'stri',
            editShipmentYear: 0,
            editShipmentProgr: 0,
            editShipmentFullNumber: 'string',
            callerSubjectType: ShipmentSubjectType::Commissioner,
            branchCode: '',
            shipmentDate: new DateTime('2025-11-24T16:25:00.121Z'),
            shipmentStatus: ShipmentStatusType::ToBeConfirmed,
            transportIncotermsCode: '',
            commissionerReferenceNumber: '',
            commissionerReferenceDate: null,
            commissionerDocumentCode: '',
            sender: new SubjectData(
                zipCode: '',
                city: '',
                countryCode: '',
                address: '',
                address2: '',
                companyName: '',
                furtherCompanyName: '',
                province: '',
                geocodeLatitude: 0,
                geocodeLongitude: 0,
            ),
            senderReferenceDate: null,
            senderDocumentCode: '',
            collectionLocation: new SubjectData(
                zipCode: '',
                city: '',
                countryCode: '',
                address: '',
                address2: '',
                companyName: '',
                furtherCompanyName: '',
                province: '',
                geocodeLatitude: 0,
                geocodeLongitude: 0,
            ),
            consignee: new SubjectData(
                zipCode: '',
                city: '',
                countryCode: '',
                address: '',
                address2: '',
                companyName: '',
                furtherCompanyName: '',
                province: '',
                geocodeLatitude: 0,
                geocodeLongitude: 0,
            ),
            consigneeReferenceNumber: '',
            consigneeReferenceDate: null,
            consigneeDocumentCode: '',
            deliveryLocation: new SubjectData(
                zipCode: '',
                city: '',
                countryCode: '',
                address: '',
                address2: '',
                companyName: '',
                furtherCompanyName: '',
                province: '',
                geocodeLatitude: 0,
                geocodeLongitude: 0,
            ),
            departureAirportID: '',
            arrivalAirportID: '',
            destinationAirportID: '',
            embarkationPortID: '',
            arrivalPortID: '',
            landingPortID: '',
            isGoodsCollectionRequested: true,
            collectionRequestDateTime: null,
            deliveryRequestDateTime: null,
            parcelLabelQuantity: 0,
            palletTypeCode: '',
            palletQuantity: 0,
            cashOnDeliveryCurrencyCode: '',
            cashOnDeliveryAmount: 0,
            cashOnDeliveryTypeCode: '',
            collectionNotes: '',
            deliveryNotes: '',
            goodsDetails: [
                new ShipmentGoodDetailData(
                    packages: 0,
                    productClassCode: '',
                    goodsDescription: '',
                    goodsAppearanceCode: '',
                    grossWeight: 0,
                    cubeMeters: 0,
                    linearMeters: 0,
                    goodsValue: 0,
                    goodsValueCurrencyCode: 'EUR',
                    sizes: [
                        new ShipmentGoodDetailSizeData(
                            packages: 0,
                            sizeUM: SizeUnitOfMeasure::Centimeters,
                            sizeLength: 0,
                            sizeWidth: 0,
                            sizeHeight: 0,
                            grossWeight: 0,
                            areStackableGoods: true,
                        ),
                    ],
                ),
            ],
            containers: [
                new ShipmentContainerData(
                    containerType: '',
                    containerQty: 0,
                ),
            ],
            events: [
                new ShipmentEventData(
                    eventCode: '',
                    eventQty: 0,
                ),
            ],
            contacts: [
                new ShipmentContactData(
                    subjectType: ContactSubjectType::Sender,
                    title: ContactTitle::NotSelected,
                    name: '',
                    surname: '',
                    phoneNumber: '',
                    mobileNumber: '',
                    languageCode: 'st',
                    emailAddress: '',
                    sendFSUNotificationEmail: true,
                ),
            ],
        ),
        parcelLabelsGenerationMode: ParcelLabelsGenerationMode::NoPrint,
        documentAttachments: [
            new DocumentAttachmentData(
                documentContentExtension: '.PDF',
                documentContent: '',
                documentNumber: '',
                documentDate: new DateTime,
                documentDescription: '',
                documentType: 'string',
            ),
        ],
        parcelLabelsRenderingWidthInches: 0,
        parcelLabelsRenderingHeightInches: 0,
    );

    expect($requestData)->toBeInstanceOf(PostShipmentRequestData::class);
    expect($requestData->interchangeToken)->toBe('NEWABC123');
    expect($requestData->shipmentData->senderReferenceNumber)->toBe('string');
    expect($requestData->parcelLabelsGenerationMode)->toBe(ParcelLabelsGenerationMode::NoPrint);
});

it('can create a PostShipmentRequest from PostShipmentRequestData', function () {
    $requestData = new PostShipmentRequestData(
        interchangeToken: 'NEWABC123',
        shipmentData: new ShipmentData(
            serviceCode: 'EXP',
            shipmentPracticeType: ShipmentPracticeType::RoadShipment,
            deliveryRequestType: DeliveryDateType::NoDeliveryPreference,
            senderReferenceNumber: 'REF-001',
        ),
        parcelLabelsGenerationMode: ParcelLabelsGenerationMode::NoPrint,
    );

    $request = new PostShipmentRequest($requestData);

    expect($request)->toBeInstanceOf(PostShipmentRequest::class);
    expect($request->resolveEndpoint())->toBe('/novaexchange/shipments');
});

it('can create a DeleteShipmentRequest', function () {
    $requestData = new DeleteShipmentRequestData(
        interchangeToken: 'NEWABC123',
        serviceCode: 'EXP',
        shipmentFullNumber: 'MI-2024-00001',
    );

    $request = new DeleteShipmentRequest($requestData);

    expect($request)->toBeInstanceOf(DeleteShipmentRequest::class);
    expect($request->resolveEndpoint())->toBe('/novaexchange/shipments');
});

it('can serialize PostShipmentRequestData to array', function () {
    $requestData = new PostShipmentRequestData(
        interchangeToken: 'NEWABC123',
        shipmentData: new ShipmentData(
            serviceCode: 'EXP',
            shipmentPracticeType: ShipmentPracticeType::RoadShipment,
            deliveryRequestType: DeliveryDateType::NoDeliveryPreference,
            senderReferenceNumber: 'REF-001',
            sender: new SubjectData(
                zipCode: '20100',
                city: 'Milano',
                countryCode: 'IT',
                address: 'Via Roma 1',
                address2: '',
                companyName: 'ACME Corp',
            ),
        ),
        parcelLabelsGenerationMode: ParcelLabelsGenerationMode::PdfGrouped,
    );

    $array = $requestData->toArray();

    expect($array)->toBeArray();
    expect($array['InterchangeToken'])->toBe('NEWABC123');
    expect($array['ShipmentData']['ServiceCode'])->toBe('EXP');
    expect($array['ShipmentData']['Sender']['ZipCode'])->toBe('20100');
    expect($array['ParcelLabelsGenerationMode'])->toBe('PdfGrouped');
});

it('can create a real-world La Sportiva shipment example', function () {
    $requestData = new PostShipmentRequestData(
        interchangeToken: 'NEW04V0GC831NVCZK81W9S3HMJPC23C',
        shipmentData: new ShipmentData(
            serviceCode: 'EE',
            shipmentPracticeType: ShipmentPracticeType::RoadShipment,
            deliveryRequestType: DeliveryDateType::NoDeliveryPreference,
            senderReferenceNumber: '0080070933',
            editShipmentFullNumber: '01/2025/311916',
            callerSubjectType: ShipmentSubjectType::Sender,
            branchCode: '01',
            shipmentDate: new DateTime('2025-10-22T10:54:44.22Z'),
            shipmentStatus: ShipmentStatusType::ToBeConfirmed,
            transportIncotermsCode: '1',
            commissionerReferenceNumber: '',
            sender: new SubjectData(
                zipCode: '31047',
                city: 'Levada',
                countryCode: 'IT',
                address: 'Via delle Industrie 19',
                address2: '',
                companyName: 'La Sportiva C/o Movimoda',
                province: 'TV',
                geocodeLatitude: 0,
                geocodeLongitude: 0,
            ),
            senderDocumentCode: 'ORD',
            consignee: new SubjectData(
                zipCode: '74700',
                city: 'Sallanches',
                countryCode: 'FR',
                address: 'ROUTE DU FAYET 925',
                address2: '',
                companyName: 'AU VIEUX CAMPEUR SALLANCHES',
                province: '',
                geocodeLatitude: 0,
                geocodeLongitude: 0,
            ),
            consigneeReferenceNumber: '0080070933',
            isGoodsCollectionRequested: false,
            parcelLabelQuantity: 9,
            palletQuantity: 0,
            cashOnDeliveryAmount: 0,
            goodsDetails: [
                new ShipmentGoodDetailData(
                    packages: 9,
                    productClassCode: 'AR',
                    goodsDescription: 'Articoli sportivi',
                    goodsAppearanceCode: '01',
                    grossWeight: 154.58,
                    cubeMeters: 1.551,
                    linearMeters: 0,
                    goodsValue: 0,
                    sizes: [
                        new ShipmentGoodDetailSizeData(
                            packages: 1,
                            sizeUM: SizeUnitOfMeasure::Centimeters,
                            sizeLength: 63,
                            sizeWidth: 38,
                            sizeHeight: 72,
                            grossWeight: 18.26,
                            areStackableGoods: true,
                        ),
                        new ShipmentGoodDetailSizeData(
                            packages: 1,
                            sizeUM: SizeUnitOfMeasure::Centimeters,
                            sizeLength: 63,
                            sizeWidth: 38,
                            sizeHeight: 72,
                            grossWeight: 18.24,
                            areStackableGoods: true,
                        ),
                        new ShipmentGoodDetailSizeData(
                            packages: 1,
                            sizeUM: SizeUnitOfMeasure::Centimeters,
                            sizeLength: 63,
                            sizeWidth: 38,
                            sizeHeight: 72,
                            grossWeight: 17.66,
                            areStackableGoods: true,
                        ),
                        new ShipmentGoodDetailSizeData(
                            packages: 1,
                            sizeUM: SizeUnitOfMeasure::Centimeters,
                            sizeLength: 63,
                            sizeWidth: 38,
                            sizeHeight: 72,
                            grossWeight: 16.66,
                            areStackableGoods: true,
                        ),
                        new ShipmentGoodDetailSizeData(
                            packages: 1,
                            sizeUM: SizeUnitOfMeasure::Centimeters,
                            sizeLength: 63,
                            sizeWidth: 38,
                            sizeHeight: 72,
                            grossWeight: 15.82,
                            areStackableGoods: true,
                        ),
                        new ShipmentGoodDetailSizeData(
                            packages: 1,
                            sizeUM: SizeUnitOfMeasure::Centimeters,
                            sizeLength: 63,
                            sizeWidth: 38,
                            sizeHeight: 72,
                            grossWeight: 16.38,
                            areStackableGoods: true,
                        ),
                        new ShipmentGoodDetailSizeData(
                            packages: 1,
                            sizeUM: SizeUnitOfMeasure::Centimeters,
                            sizeLength: 63,
                            sizeWidth: 38,
                            sizeHeight: 72,
                            grossWeight: 16.78,
                            areStackableGoods: true,
                        ),
                        new ShipmentGoodDetailSizeData(
                            packages: 1,
                            sizeUM: SizeUnitOfMeasure::Centimeters,
                            sizeLength: 63,
                            sizeWidth: 38,
                            sizeHeight: 72,
                            grossWeight: 16.88,
                            areStackableGoods: true,
                        ),
                        new ShipmentGoodDetailSizeData(
                            packages: 1,
                            sizeUM: SizeUnitOfMeasure::Centimeters,
                            sizeLength: 63,
                            sizeWidth: 38,
                            sizeHeight: 72,
                            grossWeight: 17.90,
                            areStackableGoods: true,
                        ),
                    ],
                ),
            ],
            contacts: [
                new ShipmentContactData(
                    subjectType: ContactSubjectType::Consignee,
                    title: ContactTitle::NotSelected,
                    name: 'AU VIEUX CAMPEUR SALLANCHES',
                    surname: '',
                    phoneNumber: '+33450912662',
                    mobileNumber: '',
                    languageCode: 'en',
                    emailAddress: '',
                    sendFSUNotificationEmail: false,
                ),
            ],
        ),
        parcelLabelsGenerationMode: ParcelLabelsGenerationMode::ZplOneForEachLabel,
    );

    // Verify the structure
    expect($requestData)->toBeInstanceOf(PostShipmentRequestData::class);
    expect($requestData->interchangeToken)->toBe('NEW04V0GC831NVCZK81W9S3HMJPC23C');
    expect($requestData->parcelLabelsGenerationMode)->toBe(ParcelLabelsGenerationMode::ZplOneForEachLabel);

    // Verify shipment data
    expect($requestData->shipmentData->serviceCode)->toBe('EE');
    expect($requestData->shipmentData->editShipmentFullNumber)->toBe('01/2025/311916');
    expect($requestData->shipmentData->senderReferenceNumber)->toBe('0080070933');
    expect($requestData->shipmentData->parcelLabelQuantity)->toBe(9.0);

    // Verify sender
    expect($requestData->shipmentData->sender->companyName)->toBe('La Sportiva C/o Movimoda');
    expect($requestData->shipmentData->sender->countryCode)->toBe('IT');

    // Verify consignee
    expect($requestData->shipmentData->consignee->companyName)->toBe('AU VIEUX CAMPEUR SALLANCHES');
    expect($requestData->shipmentData->consignee->countryCode)->toBe('FR');

    // Verify goods details
    expect($requestData->shipmentData->goodsDetails)->toHaveCount(1);
    expect($requestData->shipmentData->goodsDetails[0]->packages)->toBe(9);
    expect($requestData->shipmentData->goodsDetails[0]->grossWeight)->toBe(154.58);
    expect($requestData->shipmentData->goodsDetails[0]->sizes)->toHaveCount(9);

    // Verify contacts
    expect($requestData->shipmentData->contacts)->toHaveCount(1);
    expect($requestData->shipmentData->contacts[0]->phoneNumber)->toBe('+33450912662');

    // Verify serialization produces correct JSON structure
    $array = $requestData->toArray();
    expect($array['InterchangeToken'])->toBe('NEW04V0GC831NVCZK81W9S3HMJPC23C');
    expect($array['ShipmentData']['EditShipmentFullNumber'])->toBe('01/2025/311916');
    expect($array['ShipmentData']['Sender']['CompanyName'])->toBe('La Sportiva C/o Movimoda');
    expect($array['ShipmentData']['GoodsDetails'][0]['Sizes'])->toHaveCount(9);
    expect($array['ParcelLabelsGenerationMode'])->toBe('ZplOneForEachLabel');

    $client = new \SmartDato\NovaSystemsEdi\Connectors\NovaSystemsEdiConnector(
        apiKey: 'your_api_key_here',
        baseUrl: 'https://api.novasystemsedi.com',
    );
    $response = $client->send(
        new PostShipmentRequest(
            $requestData
        )
    );

    ray($response);
});
