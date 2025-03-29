<?php

namespace Conext\Ads\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class WebhookService
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function list(): array
    {
        $response = $this->client->get('webhooks');
        return json_decode($response->getBody()->getContents(), true);
    }

    public function create(array $data): array
    {
        $response = $this->client->post('webhooks', ['json' => $data]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function update(string $id, array $data): array
    {
        $response = $this->client->put("webhooks/{$id}", ['json' => $data]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function delete(string $id): void
    {
        $this->client->delete("webhooks/{$id}");
    }
}