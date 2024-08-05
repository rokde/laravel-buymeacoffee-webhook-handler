<?php

namespace Rokde\LaravelBuyMeACoffeeWebhookHandler\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Rokde\LaravelBuyMeACoffeeWebhookHandler\LaravelBuyMeACoffeeWebhookHandlerServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelBuyMeACoffeeWebhookHandlerServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
    }
}
