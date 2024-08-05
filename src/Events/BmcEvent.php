<?php

namespace Rokde\LaravelBuyMeACoffeeWebhookHandler\Events;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Rokde\LaravelBuyMeACoffeeWebhookHandler\Transformer\Boolean;

abstract class BmcEvent
{
    public function __construct(
        protected array $payload,
        private bool $liveMode,
        private int $attempt,
        private Carbon $sendAt,
        private int $eventId,
    )
    {

    }

    public static function makeFromRequest(Request $request): static
    {
        return new static(
            $request->get('data'),
            $request->boolean('live_mode'),
            $request->integer('attempt'),
            $request->date('created'),
            $request->integer('eventId'),
        );
    }

    public function liveMode(): bool
    {
        return $this->liveMode;
    }

    public function testMode(): bool
    {
        return !$this->liveMode();
    }

    public function attempt(): int
    {
        return $this->attempt;
    }

    public function sendAt(): Carbon
    {
        return $this->sendAt;
    }

    public function eventId(): int
    {
        return $this->eventId;
    }

    public function id(): int
    {
        return (int) data_get($this->payload, 'id');
    }

    public function amount(): int
    {
        return (int) data_get($this->payload, 'amount');
    }

    public function object(): string
    {
        return (string) data_get($this->payload, 'object');
    }

    public function status(): string
    {
        return (string) data_get($this->payload, 'status');
    }

    public function currency(): string
    {
        return (string) data_get($this->payload, 'currency');
    }

    public function noteHidden(): bool
    {
        return Boolean::transform(data_get($this->payload, 'note_hidden'));
    }

    public function supportNote(): string|null
    {
        return data_get($this->payload, 'support_note');
    }

    public function supporterName(): string
    {
        return (string) data_get($this->payload, 'supporter_name');
    }

    public function supporterId(): int
    {
        return (int) data_get($this->payload, 'supporter_id');
    }

    public function supporterEmail(): string
    {
        return (string) data_get($this->payload, 'supporter_name');
    }
}
