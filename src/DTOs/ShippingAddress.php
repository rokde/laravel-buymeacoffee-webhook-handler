<?php

namespace Rokde\LaravelBuyMeACoffeeWebhookHandler\DTOs;

final readonly class ShippingAddress
{
    public function __construct(
        public string $name,
        public string $street,
        public string $zip,
        public string $city,
        public string $state,
        public string $country,
    ) {}

    public static function fromArray(array $extra): static
    {
        return new self(
            name: (string) data_get($extra, 'name'),
            street: (string) data_get($extra, 'street'),
            zip: (string) data_get($extra, 'zip'),
            city: (string) data_get($extra, 'city'),
            state: (string) data_get($extra, 'state'),
            country: (string) data_get($extra, 'country'),
        );
    }
}
