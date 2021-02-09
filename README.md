# Laravel Elavon / Converge API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/treestoneit/laravel-converge-api.svg?style=flat-square)](https://packagist.org/packages/treestoneit/laravel-converge-api)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/treestoneit/laravel-converge-api/run-tests?label=tests)](https://github.com/treestoneit/laravel-converge-api/actions?query=workflow%3ATests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/treestoneit/laravel-converge-api/Check%20&%20fix%20styling?label=code%20style)](https://github.com/treestoneit/laravel-converge-api/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/treestoneit/laravel-converge-api.svg?style=flat-square)](https://packagist.org/packages/treestoneit/laravel-converge-api)


A simple, easy to use Laravel wrapper for Elavon's Converge API via key value pairs instead of XML.

## Installation

You can install the package via composer:

```bash
composer require treestoneit/laravel-converge-api
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Treestoneit\LaravelConvergeApi\LaravelConvergeApiServiceProvider" --tag="laravel-converge-api-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Treestoneit\LaravelConvergeApi\LaravelConvergeApiServiceProvider" --tag="laravel-converge-api-config"
```

This is the contents of the published config file:

```php
return [
    /*
     * Merchant ID: Elavon-assigned Converge account ID.
     */
    'merchant_id' => env('CONVERGE_MERCHANT_ID', ''),

    /*
     * Converge User ID: The user ID with Hosted Payment API User status that
     * can send transaction requests through the terminal.
     */
    'user_id'     => env('CONVERGE_USER_ID', ''),

    /*
     * Terminal ID: Unique identifier of the terminal that will process the 
     * transaction request and submit to the Converge gateway.
     * 
     * Important: The ssl_user_id sending the transaction request must be 
     * associated with the terminal that will process the request.
     */
    'pin'         => env('CONVERGE_PIN', ''),

    /*
     * Demo / Live Site
     */
    'demo'        => env('CONVERGE_DEMO', true),
];
```

## Usage

```php
$laravel-converge-api = new Treestoneit\LaravelConvergeApi();
echo $laravel-converge-api->echoPhrase('Hello, Treestoneit!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Bomshteyn Consulting](https://github.com/treestoneit)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
