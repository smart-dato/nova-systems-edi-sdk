<?php

// config for SmartDato/NovaSystemsEdi
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
