<?php

namespace Rokde\LaravelBuyMeACoffeeWebhookHandler\DTOs;

final readonly class Commission
{
    public function __construct(
        public int $id,
        public string $name,
        public array $addons,
        public float $amount,
        public string $object,
        public array $attachments,
        public string $description,
        public string $refundReason,
        public float $shippingPrice,
        public string $additionalInfo,
        public float $discountAmount,
        public ShippingAddress $shippingAddress,
        public float $totalOrderAmount,
    ) {}

    public static function fromArray(array $extra): static
    {
        return new self(
            id: (int) data_get($extra, 'id'),
            name: (string) data_get($extra, 'name'),
            addons: (array) data_get($extra, 'addons'),
            amount: (float) data_get($extra, 'amount'),
            object: (string) data_get($extra, 'object'),
            attachments: (array) data_get($extra, 'attachments'),
            description: (string) data_get($extra, 'description'),
            refundReason: (string) data_get($extra, 'refund_reason'),
            shippingPrice: (float) data_get($extra, 'shipping_price'),
            additionalInfo: (string) data_get($extra, 'additional_info'),
            discountAmount: (float) data_get($extra, 'discount_amount'),
            shippingAddress: ShippingAddress::fromArray((array) data_get($extra, 'shipping_address')),
            totalOrderAmount: (float) data_get($extra, 'total_order_amount'),
        );
    }
}
