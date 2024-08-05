<?php

use Illuminate\Support\Facades\Route;
use Rokde\LaravelBuyMeACoffeeWebhookHandler\Http\Controllers\WebhookController;
use Rokde\LaravelBuyMeACoffeeWebhookHandler\Http\Middleware\VerifyWebhook;

Route::post(config('buymeacoffee.url', '/webhooks/buymeacoffee'), WebhookController::class)
    ->middleware(VerifyWebhook::class);
