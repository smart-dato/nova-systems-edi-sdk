# Nova Systems EDI SDK

[![Latest Version on Packagist](https://img.shields.io/packagist/v/smart-dato/nova-systems-edi-sdk.svg?style=flat-square)](https://packagist.org/packages/smart-dato/nova-systems-edi-sdk)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/smart-dato/nova-systems-edi-sdk/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/smart-dato/nova-systems-edi-sdk/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/smart-dato/nova-systems-edi-sdk/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/smart-dato/nova-systems-edi-sdk/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/smart-dato/nova-systems-edi-sdk.svg?style=flat-square)](https://packagist.org/packages/smart-dato/nova-systems-edi-sdk)

A Laravel SDK for the Nova Systems EDI API, built with [Saloon](https://docs.saloon.dev/).

**API Documentation:** [Nova Systems EDI API Swagger](https://beonews.novasystems.it/api/swagger/index.html?urls.primaryName=EDI)

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/nova-systems-edi-sdk.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/nova-systems-edi-sdk)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require smart-dato/nova-systems-edi-sdk
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="nova-systems-edi-sdk-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="nova-systems-edi-sdk-config"
```

This is the contents of the published config file:

```php
return [

    /*
    |--------------------------------------------------------------------------
    | Base URL
    |--------------------------------------------------------------------------
    |
    | The base URL for the Nova Systems EDI API.
    |
    */
    'base_url' => env('NOVA_SYSTEMS_EDI_BASE_URL', 'https://api.novasystems.com'),

    /*
    |--------------------------------------------------------------------------
    | API Key
    |--------------------------------------------------------------------------
    |
    | Your Nova Systems EDI API key for X-ApiKey authentication.
    |
    */
    'api_key' => env('NOVA_SYSTEMS_EDI_API_KEY'),

    /*
    |--------------------------------------------------------------------------
    | JWT Token
    |--------------------------------------------------------------------------
    |
    | JWT token for Bearer token authentication. If set, this will be used
    | instead of the API key.
    |
    */
    'jwt_token' => env('NOVA_SYSTEMS_EDI_JWT_TOKEN'),

    /*
    |--------------------------------------------------------------------------
    | Request Timeout
    |--------------------------------------------------------------------------
    |
    | The timeout in seconds for API requests.
    |
    */
    'timeout' => env('NOVA_SYSTEMS_EDI_TIMEOUT', 30),

];
```

Add the following environment variables to your `.env` file:

```env
NOVA_SYSTEMS_EDI_BASE_URL=https://api.novasystems.com
NOVA_SYSTEMS_EDI_API_KEY=your-api-key
NOVA_SYSTEMS_EDI_JWT_TOKEN=your-jwt-token
NOVA_SYSTEMS_EDI_TIMEOUT=30
```

## Authentication

The SDK supports two authentication methods:

### X-ApiKey Authentication

Uses the `X-ApiKey` header with your API key.

### JWT Bearer Authentication

Uses the `Authorization` header with a Bearer token: `Bearer {your-jwt-token}`.

> **Note:** If both `api_key` and `jwt_token` are configured, JWT authentication takes precedence.

## Usage

### Via Dependency Injection (Recommended)

The connector is registered as a singleton in the service container and will automatically use credentials from your config:

```php
use SmartDato\NovaSystemsEdi\Connectors\NovaSystemsEdiConnector;

class MyService
{
    public function __construct(
        protected NovaSystemsEdiConnector $connector
    ) {}

    public function doSomething()
    {
        // Use $this->connector to make requests
    }
}
```

### Via Container

```php
use SmartDato\NovaSystemsEdi\Connectors\NovaSystemsEdiConnector;

$connector = app(NovaSystemsEdiConnector::class);
```

### Static Factory Methods

Create a connector with specific authentication:

```php
use SmartDato\NovaSystemsEdi\Connectors\NovaSystemsEdiConnector;

// With API Key authentication
$connector = NovaSystemsEdiConnector::withApiKey('your-api-key');

// With API Key and custom base URL
$connector = NovaSystemsEdiConnector::withApiKey('your-api-key', 'https://custom-api.com');

// With JWT authentication
$connector = NovaSystemsEdiConnector::withJwt('your-jwt-token');

// With JWT and custom base URL
$connector = NovaSystemsEdiConnector::withJwt('your-jwt-token', 'https://custom-api.com');
```

### Direct Instantiation

```php
use SmartDato\NovaSystemsEdi\Connectors\NovaSystemsEdiConnector;

$connector = new NovaSystemsEdiConnector(
    apiKey: 'your-api-key',
    jwtToken: null,
    baseUrl: 'https://custom-api.com'
);
```

## Examples

### Creating a Shipment

```php
use SmartDato\NovaSystemsEdi\Connectors\NovaSystemsEdiConnector;
use SmartDato\NovaSystemsEdi\Data\PostShipmentRequestData;
use SmartDato\NovaSystemsEdi\Data\ShipmentContactData;
use SmartDato\NovaSystemsEdi\Data\ShipmentData;
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
use SmartDato\NovaSystemsEdi\Requests\PostShipmentRequest;

$connector = app(NovaSystemsEdiConnector::class);

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
        sender: new SubjectData(
            zipCode: '31047',
            city: 'Levada',
            countryCode: 'IT',
            address: 'Via delle Industrie 19',
            address2: '',
            companyName: 'La Sportiva C/o Movimoda',
            province: 'TV',
        ),
        senderDocumentCode: 'ORD',
        consignee: new SubjectData(
            zipCode: '74700',
            city: 'Sallanches',
            countryCode: 'FR',
            address: 'ROUTE DU FAYET 925',
            address2: '',
            companyName: 'AU VIEUX CAMPEUR SALLANCHES',
        ),
        consigneeReferenceNumber: '0080070933',
        isGoodsCollectionRequested: false,
        parcelLabelQuantity: 9,
        goodsDetails: [
            new ShipmentGoodDetailData(
                packages: 9,
                productClassCode: 'AR',
                goodsDescription: 'Articoli sportivi',
                goodsAppearanceCode: '01',
                grossWeight: 154.58,
                cubeMeters: 1.551,
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
                    // ... more sizes
                ],
            ),
        ],
        contacts: [
            new ShipmentContactData(
                subjectType: ContactSubjectType::Consignee,
                title: ContactTitle::NotSelected,
                name: 'AU VIEUX CAMPEUR SALLANCHES',
                phoneNumber: '+33450912662',
                languageCode: 'en',
            ),
        ],
    ),
    parcelLabelsGenerationMode: ParcelLabelsGenerationMode::ZplOneForEachLabel,
);

$response = $connector->send(new PostShipmentRequest($requestData));
```

### Deleting a Shipment

```php
use SmartDato\NovaSystemsEdi\Data\DeleteShipmentRequestData;
use SmartDato\NovaSystemsEdi\Requests\DeleteShipmentRequest;

$connector = app(NovaSystemsEdiConnector::class);

$requestData = new DeleteShipmentRequestData(
    interchangeToken: 'NEW04V0GC831NVCZK81W9S3HMJPC23C',
    serviceCode: 'EE',
    shipmentFullNumber: '01/2025/311916',
);

$response = $connector->send(new DeleteShipmentRequest($requestData));
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [SmartDato](https://github.com/smart-dato)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
