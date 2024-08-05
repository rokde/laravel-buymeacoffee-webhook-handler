<?php

namespace Rokde\LaravelBuyMeACoffeeWebhookHandler\DTOs;

final readonly class Extra
{
    public function __construct(
        public int $id,
        public string $title,
        public float $amount,
        public int $quantity,
        public string $object,
        public string $currency,
        public string $description,
        public string $question,
        public array $answers,
    )
    {

    }

    public static function fromArray(array $extra): static
    {
        return new static(
            id: (int) data_get($extra, 'id'),
            title: (string) data_get($extra, 'title'),
            amount: (float) data_get($extra, 'amount'),
            quantity: (int) data_get($extra, 'quantity'),
            object: (string) data_get($extra, 'object'),
            currency: (string) data_get($extra, 'currency'),
            description: (string) data_get($extra, 'description'),
            question: (string) data_get($extra, 'question'),
            answers: (array) data_get($extra, 'answers', []),
        );
    }}
