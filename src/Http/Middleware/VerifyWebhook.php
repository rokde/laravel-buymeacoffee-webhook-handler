<?php

namespace Rokde\LaravelBuyMeACoffeeWebhookHandler\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VerifyWebhook
{
    public function handle(Request $request, Closure $next)
    {
        return $this->verify($request)
            ? $next($request)
            : response('Signature did not match!', Response::HTTP_BAD_REQUEST);
    }

    private function verify(Request $request): bool
    {
        if (! str_contains($request->userAgent(), 'BMC-HTTPS-ROBOT')) {
            return false;
        }

        $signature = $request->header('X-Signature-Sha256');
        if (! $signature) {
            return false;
        }

        return hash_equals(hash_hmac('sha256', $request->getContent(), config('buymeacoffee.secret')), $signature);
    }
}
