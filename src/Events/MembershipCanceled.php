<?php

namespace Rokde\LaravelBuyMeACoffeeWebhookHandler\Events;

class MembershipCanceled extends MembershipEvent
{
    public function supporterFeedback(): string
    {
        return (string) data_get($this->payload, 'supporter_feedback');
    }
}
