<?php

namespace SmartDato\NovaSystemsEdi\Connectors;

use Saloon\Contracts\Authenticator;
use Saloon\Http\Auth\HeaderAuthenticator;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

class NovaSystemsEdiConnector extends Connector
{
    use AcceptsJson;

    public function __construct(
        protected ?string $apiKey = null,
        protected ?string $jwtToken = null,
        protected ?string $baseUrl = null,
    ) {
        $this->apiKey = $apiKey ?? config('nova-systems-edi-sdk.api_key');
        $this->jwtToken = $jwtToken ?? config('nova-systems-edi-sdk.jwt_token');
        $this->baseUrl = $baseUrl ?? config('nova-systems-edi-sdk.base_url');
    }

    public function resolveBaseUrl(): string
    {
        return $this->baseUrl ?? '';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
        ];
    }

    protected function defaultConfig(): array
    {
        return [
            'timeout' => config('nova-systems-edi-sdk.timeout', 30),
        ];
    }

    protected function defaultAuth(): ?Authenticator
    {
        // Prefer JWT token if available, otherwise use API key
        if ($this->jwtToken) {
            return new HeaderAuthenticator('Bearer '.$this->jwtToken, 'Authorization');
        }

        if ($this->apiKey) {
            return new HeaderAuthenticator($this->apiKey, 'X-ApiKey');
        }

        return null;
    }

    /**
     * Create a connector instance with API key authentication.
     */
    public static function withApiKey(string $apiKey, ?string $baseUrl = null): NovaSystemsEdiConnector
    {
        return new NovaSystemsEdiConnector(
            apiKey: $apiKey,
            jwtToken: null,
            baseUrl: $baseUrl,
        );
    }

    /**
     * Create a connector instance with JWT authentication.
     */
    public static function withJwt(string $jwtToken, ?string $baseUrl = null): NovaSystemsEdiConnector
    {
        return new NovaSystemsEdiConnector(
            apiKey: null,
            jwtToken: $jwtToken,
            baseUrl: $baseUrl,
        );
    }
}
