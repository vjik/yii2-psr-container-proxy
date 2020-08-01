<?php

namespace Vjik\Yii2\Psr\ContainerProxyTests;

abstract class AbstractColor implements ColorInterface
{
    abstract public function getColor(): string;
}
