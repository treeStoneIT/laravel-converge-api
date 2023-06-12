# Changelog

All notable changes to `laravel-converge-api` will be documented in this file.

## 2.0.0 - 2021-02-15

* Removed `wwwroth/php-converge-api` from the dependencies, and brought Converge request code into the package. This allows us more control. And existing `wwwroth/php-converge-api` package version was causing PSR4 errors.

**Breaking changes in this release:**
* `cccredit`, `force` and `avsOnly` were removed as Elavon recommends against their use.
* Instead we have added a `custom` method where you can pass `$transactionType` as your first parameter. This will allow you to use the deprecated methods if absolutely necessary.

## 1.0.0 - 2021-01-10

- initial release
