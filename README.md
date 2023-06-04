# Yii2 Container Proxy (PSR-11)

[![Latest Stable Version](https://poser.pugx.org/vjik/yii2-psr-container-proxy/v/stable.png)](https://packagist.org/packages/vjik/yii2-psr-container-proxy)
[![Total Downloads](https://poser.pugx.org/vjik/yii2-psr-container-proxy/downloads.png)](https://packagist.org/packages/vjik/yii2-psr-container-proxy)
[![Build status](https://github.com/vjik/yii2-psr-container-proxy/workflows/build/badge.svg)](https://github.com/vjik/yii2-psr-container-proxy/actions?query=workflow%3Abuild)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/vjik/yii2-psr-container-proxy/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/vjik/yii2-psr-container-proxy/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/vjik/yii2-psr-container-proxy/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/vjik/yii2-psr-container-proxy/?branch=master)

The package provide PSR-11 compatible container proxy for Yii2.

## Requirements

- PHP 7.2 or higher.
- Yii 2.0.40 or higher.

## Installation

The preferred way to install this extension is through [composer](https://getcomposer.org/download/):

```shell
composer require vjik/yii2-psr-container-proxy --prefer-dist
```

## General usage

```php
use Vjik\Yii2\Psr\ContainerProxy\ContainerProxy;

$containerProxy = new ContainerProxy(\Yii::$container);
```

## Testing

The package is tested with [PHPUnit](https://phpunit.de/). To run tests:

```shell
./vendor/bin/phpunit
```

## License

The Yii2 Container Proxy (PSR-11) is free software. It is released under the terms of the BSD License.
Please see [`LICENSE`](./LICENSE.md) for more information.
