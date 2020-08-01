<?php

namespace Vjik\Yii2\Psr\ContainerProxy;

use Psr\Container\ContainerExceptionInterface;

class NotInstantiableException extends \yii\di\NotInstantiableException implements ContainerExceptionInterface
{
}
