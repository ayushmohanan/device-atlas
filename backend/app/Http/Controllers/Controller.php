<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    protected Client $client;
    protected string $baseUrl;
    protected string $licenseKey;

    public function __construct()
    {
        #load details form .env
        $this->baseUrl = config('services.deviceatlas.base_url');
        $this->licenseKey = config('services.deviceatlas.license_key');

        #initialize Guzzle client
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'timeout'  => 10.0,
        ]);
    }
}
