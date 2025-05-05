# Buy me a coffee webhook receiving handler in Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rokde/laravel-buymeacoffee-webhook-handler.svg?style=flat-square)](https://packagist.org/packages/rokde/laravel-buymeacoffee-webhook-handler)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/rokde/laravel-buymeacoffee-webhook-handler/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/rokde/laravel-buymeacoffee-webhook-handler/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/rokde/laravel-buymeacoffee-webhook-handler/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/rokde/laravel-buymeacoffee-webhook-handler/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/rokde/laravel-buymeacoffee-webhook-handler.svg?style=flat-square)](https://packagist.org/packages/rokde/laravel-buymeacoffee-webhook-handler)

This package handles the incoming webhook calls by Buy me a Coffee. It emits Events with the provided data and you can implement the corresponding listener on your own.

## Installation

You can install the package via composer:

```bash
composer require rokde/laravel-buymeacoffee-webhook-handler
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-buymeacoffee-webhook-handler-config"
```

This is the contents of the published config file:

```php
return [
    'url' => env('BUY_ME_A_COFFEE_WEBHOOK_HANDLER_URL', '/webhooks/buymeacoffee'),
    'secret' => env('BUY_ME_A_COFFEE_WEBHOOK_SECRET'),
];
```

## Usage

Register the configured url as Webhook URL at [Buy me a coffee](https://studio.buymeacoffee.com/webhooks). 
Select the events you like to get notified to.

And configure the secret you are receiving from Buy me a coffee as environment variable `BUY_ME_A_COFFEE_WEBHOOK_SECRET`.

And you are ready to go.

You can configure your webhook url as environment variable too when you do not want to publish the configuration (`BUY_ME_A_COFFEE_WEBHOOK_HANDLER_URL`).


Configure your listener for the webhook events accordingly in your [Laravel application](https://laravel.com/docs/events#manually-registering-events).

CAUTION:

Please make sure to except the CSRF protection from the configured webhook url. You can take a look into [laravel's documentation](https://laravel.com/docs/csrf#csrf-excluding-uris) for this.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Robert Kummer](https://github.com/rokde)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
