# PSR-11 compatible container proxy for Yii2

## Installation

The preferred way to install this extension is through [composer](https://getcomposer.org/download/):

```
composer require vjik/yii2-psr-container-proxy
```

## Example

```php
use Vjik\Yii2\Psr\ContainerProxy\ContainerProxy;

$containerProxy = new ContainerProxy(\Yii::$container);
```
