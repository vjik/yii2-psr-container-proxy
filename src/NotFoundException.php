<?php

namespace Vjik\Yii2\Psr\ContainerProxy;

use Exception;
use Psr\Container\NotFoundExceptionInterface;

/**
 * NotFoundException is thrown when no entry was found in the container.
 */
class NotFoundException extends Exception implements NotFoundExceptionInterface
{
}
