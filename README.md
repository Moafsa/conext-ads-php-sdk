# Conext Ads PHP SDK

Official PHP SDK for integrating with the Conext Ads API.

## Installation

```bash
composer require conext/ads-sdk
```

## Usage

```php
<?php

use Conext\Ads\Client;

$client = new Client('your-api-key');

// List all webhooks
$webhooks = $client->webhooks()->list();

// Create a new webhook
$webhook = $client->webhooks()->create([
    'name' => 'My Webhook',
    'url' => 'https://example.com/webhook'
]);

// List all transforms
$transforms = $client->transforms()->list();

// Create a new transform
$transform = $client->transforms()->create([
    'name' => 'My Transform',
    'sourceType' => 'facebook_ads',
    'targetType' => 'google_ads'
]);

// Validate a rule
$result = $client->validation()->validateRule(
    ['type' => 'required', 'params' => ['field' => 'name']],
    ['name' => 'Test']
);
```

## Features

- Webhook Management
- Data Transformations
- Validation Rules
- Error Handling
- Retry Mechanisms
- Type Safety

## Development

1. Clone the repository
2. Install dependencies: `composer install`
3. Run tests: `composer test`

## License

MIT