<?php

namespace Vjik\Yii2\Psr\ContainerProxy;

use Psr\Container\ContainerExceptionInterface;

class InvalidConfigException extends \yii\base\InvalidConfigException implements ContainerExceptionInterface
{
}
