<?php

namespace Vjik\Yii2\Psr\ContainerProxyTests;

class RedColor extends AbstractColor
{
    public function getColor(): string
    {
        return '#ff0000';
    }
}
