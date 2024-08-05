<?php

namespace Rokde\LaravelBuyMeACoffeeWebhookHandler\Events;

use Rokde\LaravelBuyMeACoffeeWebhookHandler\Transformer\Boolean;

class MembershipUpdated extends MembershipEvent
{
    public function supporterFeedback(): string
    {
        return (string) data_get($this->payload, 'supporter_feedback');
    }

    public function canceledAtPeriodEnd(): bool
    {
        return Boolean::transform(data_get($this->payload, 'cancel_at_period_end'));
    }
}
