<?php

namespace Rokde\LaravelBuyMeACoffeeWebhookHandler\Events;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Rokde\LaravelBuyMeACoffeeWebhookHandler\Transformer\Boolean;

abstract class MembershipEvent extends BmcEvent
{
    public function paused(): bool
    {
        return Boolean::transform(data_get($this->payload, 'paused'));
    }

    public function active(): bool
    {
        return Boolean::transform($this->status(), ['active']);
    }

    public function canceled(): bool
    {
        return Boolean::transform(data_get($this->payload, 'canceled'));
    }

    public function pspId(): string
    {
        return (string) data_get($this->payload, 'psp_id');
    }

    public function membershipLevelId(): int
    {
        return (int) data_get($this->payload, 'membership_level_id');
    }

    public function membershipLevelName(): string
    {
        return (int) data_get($this->payload, 'membership_level_name');
    }

    public function startedAt(): Carbon
    {
        return Carbon::parse(data_get($this->payload, 'started_at'));
    }

    public function canceledAt(): Carbon|null
    {
        $canceledAt = data_get($this->payload, 'canceled_at');
        if (!$canceledAt) {
            return null;
        }

        return Carbon::parse($canceledAt);
    }

    public function currentPeriodStart(): Carbon
    {
        return Carbon::parse(data_get($this->payload, 'current_period_start'));
    }

    public function currentPeriodEnd(): Carbon
    {
        return Carbon::parse(data_get($this->payload, 'current_period_end'));
    }
}
