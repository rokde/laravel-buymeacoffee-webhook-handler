<?php

namespace Rokde\LaravelBuyMeACoffeeWebhookHandler\Events;

class DonationRefunded extends PaymentEvent
{
    public function coffeeCount(): int
    {
        return (int) data_get($this->payload, 'coffee_count');
    }

    public function coffeePrice(): int
    {
        return (int) data_get($this->payload, 'coffee_price');
    }
}
