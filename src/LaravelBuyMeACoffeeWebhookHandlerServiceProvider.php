<?php

namespace Rokde\LaravelBuyMeACoffeeWebhookHandler;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelBuyMeACoffeeWebhookHandlerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-buymeacoffee-webhook-handler')
            ->hasConfigFile('buymeacoffee')
            ->hasRoute('web');
    }
}
