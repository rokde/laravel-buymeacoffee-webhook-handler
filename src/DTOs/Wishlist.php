<?php

namespace Rokde\LaravelBuyMeACoffeeWebhookHandler\DTOs;

final readonly class Wishlist
{
    public function __construct(
        public int $id,
        public float $price,
        public string $title,
        public string $object,
        public bool $completed,
        public float $totalPaid,
        public string $description,
    )
    {

    }

    public static function fromArray(array $extra): static
    {
        return new static(
            id: (int) data_get($extra, 'id'),
            price: (float) data_get($extra, 'price'),
            title: (string) data_get($extra, 'title'),
            object: (string) data_get($extra, 'object'),
            completed: (bool) data_get($extra, 'completed'),
            totalPaid: (float) data_get($extra, 'total_paid'),
            description: (string) data_get($extra, 'description'),
        );
    }
}
