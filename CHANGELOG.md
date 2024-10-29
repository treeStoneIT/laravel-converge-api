# Changelog

All notable changes to `laravel-converge-api` will be documented in this file.

## v2.2.1 - 2024-10-29

Minor release: cleanup and Pint run

## V2.2.0 - 2024-10-29

### What's Changed

* Update package to support Laravel 11 by @shcherse in https://github.com/treeStoneIT/laravel-converge-api/pull/3

### New Contributors

* @shcherse made their first contribution in https://github.com/treeStoneIT/laravel-converge-api/pull/3

**Full Changelog**: https://github.com/treeStoneIT/laravel-converge-api/compare/v2.1.1...2.2.0

## v2.1.1 - 2023-06-12

updated to support Laravel 10

## 2.0.0 - 2021-02-15

- Removed `wwwroth/php-converge-api` from the dependencies, and brought Converge request code into the package. This allows us more control. And existing `wwwroth/php-converge-api` package version was causing PSR4 errors.

**Breaking changes in this release:**

- `cccredit`, `force` and `avsOnly` were removed as Elavon recommends against their use.
- Instead we have added a `custom` method where you can pass `$transactionType` as your first parameter. This will allow you to use the deprecated methods if absolutely necessary.

## 1.0.0 - 2021-01-10

- initial release
