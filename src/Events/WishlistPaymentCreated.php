<?php

namespace Rokde\LaravelBuyMeACoffeeWebhookHandler\Events;

use Rokde\LaravelBuyMeACoffeeWebhookHandler\DTOs\Wishlist;

class WishlistPaymentCreated extends PaymentEvent
{
    public function wishlist(): Wishlist
    {
        return Wishlist::fromArray((array) data_get($this->payload, 'extras', []));
    }
}
