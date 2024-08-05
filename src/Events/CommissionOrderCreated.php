<?php

namespace Rokde\LaravelBuyMeACoffeeWebhookHandler\Events;

use Rokde\LaravelBuyMeACoffeeWebhookHandler\DTOs\Commission;

class CommissionOrderCreated extends PaymentEvent
{
    public function commission(): Commission
    {
        return Commission::fromArray((array) data_get($this->payload, 'commission'));
    }
}
