<?php

namespace Rokde\LaravelBuyMeACoffeeWebhookHandler\Transformer;

use Illuminate\Support\Str;

class Boolean
{
    public static function transform(mixed $value, array $truthyValues = []): bool
    {
        if (is_bool($value)) {
            return $value;
        }

        if (is_null($value)) {
            return false;
        }

        if (is_int($value)) {
            return $value === 1;
        }

        if (in_array(Str::lower($value), $truthyValues)) {
            return true;
        }

        if (is_string($value)) {
            if (in_array($value, ['true', 'yes', 'on', '1'])) {
                return true;
            }

            return false;
        }

        return (bool) $value;
    }
}
