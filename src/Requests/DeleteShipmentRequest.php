<?php

namespace SmartDato\NovaSystemsEdi\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use SmartDato\NovaSystemsEdi\Data\DeleteShipmentRequestData;

class DeleteShipmentRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::DELETE;

    public function __construct(
        protected DeleteShipmentRequestData $data,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/novaexchange/shipments';
    }

    protected function defaultBody(): array
    {
        return $this->data->toArray();
    }
}
