<?php

namespace Rokde\LaravelBuyMeACoffeeWebhookHandler\Events;

use Rokde\LaravelBuyMeACoffeeWebhookHandler\DTOs\Extra;

class ExtrasPurchaseRefunded extends PaymentEvent
{
    /** @return array<int, \Rokde\LaravelBuyMeACoffeeWebhookHandler\DTOs\Extra> */
    public function extras(): array
    {
        return collect(data_get($this->payload, 'extras', []))
            ->map(fn (array $extra) => Extra::fromArray($extra))
            ->all();
    }
}
