# Laravel Elavon / Converge API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/treestoneit/laravel-converge-api.svg?style=flat-square)](https://packagist.org/packages/treestoneit/laravel-converge-api)
[![Fix PHP code style issues](https://github.com/treeStoneIT/laravel-converge-api/actions/workflows/fix-php-code-style-issues.yml/badge.svg)](https://github.com/treeStoneIT/laravel-converge-api/actions/workflows/fix-php-code-style-issues.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/treestoneit/laravel-converge-api.svg?style=flat-square)](https://packagist.org/packages/treestoneit/laravel-converge-api)


A simple, easy to use Laravel wrapper for Elavon's Converge API via key value pairs instead of XML.

## Installation

You can install the package via composer:

```bash
composer require treestoneit/laravel-converge-api
```


You can publish the config file with:
```bash
php artisan vendor:publish --provider="Treestoneit\LaravelConvergeApi\LaravelConvergeApiServiceProvider" --tag="config"
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
    $converge = app(\Treestoneit\LaravelConvergeApi\Converge::class);

    $createSale = $converge->authOnly([
        'ssl_card_number' => '5121212121212124',
        'ssl_exp_date' => '0325',
        'ssl_cvv2cvc2' => '321',
        'ssl_amount' => '250.00',
        'ssl_add_token' => 'Y',
    ]);
```

## Testing

On our todo list :-)

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

This package is built as a Laravel wrapper using the code in [PHP Converge API](https://github.com/wwwroth/php-converge-api) built by [Phillip Roth](https://github.com/wwwroth)

- [Bomshteyn Consulting](https://github.com/treestoneit)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
