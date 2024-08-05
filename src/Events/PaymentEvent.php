<?php

namespace Rokde\LaravelBuyMeACoffeeWebhookHandler\Events;

use Illuminate\Support\Carbon;
use Rokde\LaravelBuyMeACoffeeWebhookHandler\Transformer\Boolean;

abstract class PaymentEvent extends BmcEvent
{
    public function successful(): bool
    {
        return Boolean::transform($this->status(), ['refunded', 'succeeded']);
    }

    public function message(): string
    {
        return (string) data_get($this->payload, 'message');
    }

    public function refunded(): bool
    {
        return Boolean::transform(data_get($this->payload, 'refunded'));
    }

    public function createdAt(): Carbon
    {
        return Carbon::parse(data_get($this->payload, 'created_at'));
    }

    public function refundedAt(): Carbon|null
    {
        $refundedAt = data_get($this->payload, 'refunded_at');

        if (!$refundedAt) {
            return null;
        }

        return Carbon::parse($refundedAt);
    }

    public function supportType(): string
    {
        return (string) data_get($this->payload, 'support_type');
    }

    public function transactionId(): string
    {
        return (string) data_get($this->payload, 'transaction_id');
    }

    public function applicationFee(): float
    {
        return (float) data_get($this->payload, 'application_fee');
    }

    public function totalAmountCharged(): float
    {
        return (float) data_get($this->payload, 'total_amount_charged');
    }
}
