<?php

namespace Conext\Ads;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

class Client
{
    private HttpClient $httpClient;
    private string $apiKey;
    private array $config;

    public function __construct(string $apiKey, array $config = [])
    {
        $this->apiKey = $apiKey;
        $this->config = array_merge([
            'base_uri' => 'https://api.conext-ads.com/v1/',
            'timeout' => 30,
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
        ], $config);

        $this->httpClient = new HttpClient($this->config);
    }

    public function webhooks(): Services\WebhookService
    {
        return new Services\WebhookService($this->httpClient);
    }

    public function transforms(): Services\TransformService
    {
        return new Services\TransformService($this->httpClient);
    }

    public function validation(): Services\ValidationService
    {
        return new Services\ValidationService($this->httpClient);
    }
}