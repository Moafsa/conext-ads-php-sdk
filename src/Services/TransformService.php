<?php

namespace Conext\Ads\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class TransformService
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function list(): array
    {
        $response = $this->client->get('transforms');
        return json_decode($response->getBody()->getContents(), true);
    }

    public function create(array $data): array
    {
        $response = $this->client->post('transforms', ['json' => $data]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function update(string $id, array $data): array
    {
        $response = $this->client->put("transforms/{$id}", ['json' => $data]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function delete(string $id): void
    {
        $this->client->delete("transforms/{$id}");
    }

    public function execute(string $id, array $data): array
    {
        $response = $this->client->post("transforms/{$id}/execute", ['json' => $data]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function getStatus(string $id): array
    {
        $response = $this->client->get("transforms/{$id}/status");
        return json_decode($response->getBody()->getContents(), true);
    }
}