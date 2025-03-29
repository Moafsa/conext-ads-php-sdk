<?php

namespace Conext\Ads\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ValidationService
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function validateRule(array $rule, array $data): array
    {
        $response = $this->client->post("validate/{$rule['type']}", [
            'json' => [
                'rule' => $rule,
                'data' => $data
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
}