<?php

namespace Rokde\LaravelBuyMeACoffeeWebhookHandler\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Rokde\LaravelBuyMeACoffeeWebhookHandler\Events\CommissionOrderCreated;
use Rokde\LaravelBuyMeACoffeeWebhookHandler\Events\CommissionOrderRefunded;
use Rokde\LaravelBuyMeACoffeeWebhookHandler\Events\DonationCreated;
use Rokde\LaravelBuyMeACoffeeWebhookHandler\Events\DonationRefunded;
use Rokde\LaravelBuyMeACoffeeWebhookHandler\Events\ExtrasPurchased;
use Rokde\LaravelBuyMeACoffeeWebhookHandler\Events\ExtrasPurchaseRefunded;
use Rokde\LaravelBuyMeACoffeeWebhookHandler\Events\MembershipCanceled;
use Rokde\LaravelBuyMeACoffeeWebhookHandler\Events\MembershipStarted;
use Rokde\LaravelBuyMeACoffeeWebhookHandler\Events\MembershipUpdated;
use Rokde\LaravelBuyMeACoffeeWebhookHandler\Events\WishlistPaymentCreated;
use Rokde\LaravelBuyMeACoffeeWebhookHandler\Events\WishlistPaymentRefunded;

class WebhookController
{
    public function __invoke(Request $request): JsonResponse
    {
        $eventType = $request->get('type');
        $event = null;

        switch ($eventType) {
            case 'donation.created':
                $event = DonationCreated::makeFromRequest($request);
                break;
            case 'donation.refunded':
                $event = DonationRefunded::makeFromRequest($request);
                break;
            case 'extra_purchase.created':
                $event = ExtrasPurchased::makeFromRequest($request);
                break;
            case 'extra_purchase.refunded':
                $event = ExtrasPurchaseRefunded::makeFromRequest($request);
                break;
            case 'commission_order.created':
                $event = CommissionOrderCreated::makeFromRequest($request);
                break;
            case 'commission_order.refunded':
                $event = CommissionOrderRefunded::makeFromRequest($request);
                break;
            case 'wishlist_payment.created':
                $event = WishlistPaymentCreated::makeFromRequest($request);
                break;
            case 'wishlist_payment.refunded':
                $event = WishlistPaymentRefunded::makeFromRequest($request);
                break;
            case 'membership.started':
                $event = MembershipStarted::makeFromRequest($request);
                break;
            case 'membership.updated':
                $event = MembershipUpdated::makeFromRequest($request);
                break;
            case 'membership.cancelled':
                $event = MembershipCanceled::makeFromRequest($request);
                break;
        }

        if ($event !== null) {
            event($event);
        }

        return response()->json('Thank you');
    }
}
