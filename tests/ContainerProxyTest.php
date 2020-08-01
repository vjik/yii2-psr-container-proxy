<?php

namespace Vjik\Yii2\Psr\ContainerProxyTests;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Vjik\Yii2\Psr\ContainerProxy\ContainerProxy;
use Vjik\Yii2\Psr\ContainerProxy\InvalidConfigException;
use Vjik\Yii2\Psr\ContainerProxy\NotFoundException;
use Vjik\Yii2\Psr\ContainerProxy\NotInstantiableException;
use yii\di\Container;

class ContainerProxyTest extends TestCase
{

    public function testValid()
    {
        $container = new Container();
        $container->set(ColorInterface::class, RedColor::class);
        $proxy = new ContainerProxy($container);

        $color = $proxy->get(ColorInterface::class);
        $this->assertInstanceOf(RedColor::class, $color);
    }

    public function testNotFoundException()
    {
        $container = new Container();
        $proxy = new ContainerProxy($container);

        $this->expectException(NotFoundExceptionInterface::class);
        $this->expectException(NotFoundException::class);
        $proxy->get('NotFound');
    }

    public function testNotInstantiableException()
    {
        $container = new Container();
        $container->set(ColorInterface::class, ['class' => AbstractColor::class]);
        $proxy = new ContainerProxy($container);

        $this->expectException(ContainerExceptionInterface::class);
        $this->expectException(NotInstantiableException::class);
        $proxy->get(ColorInterface::class);
    }

    public function testInvalidConfigException()
    {
        $container = new Container();
        $container->set(ColorInterface::class, 'NotFound');
        $proxy = new ContainerProxy($container);

        $this->expectException(ContainerExceptionInterface::class);
        $this->expectException(InvalidConfigException::class);
        $proxy->get(ColorInterface::class);
    }

    public function testHasSingleton()
    {
        $container = new Container();
        $container->setSingleton(ColorInterface::class, RedColor::class);
        $proxy = new ContainerProxy($container);

        $this->assertTrue($proxy->has(ColorInterface::class));
    }

    public function testHasDefinition()
    {
        $container = new Container();
        $container->set(ColorInterface::class, RedColor::class);
        $proxy = new ContainerProxy($container);

        $this->assertTrue($proxy->has(ColorInterface::class));
    }

    public function testHasClass()
    {
        $container = new Container();
        $proxy = new ContainerProxy($container);

        $this->assertTrue($proxy->has(RedColor::class));
    }

    public function testHasNotFound()
    {
        $container = new Container();
        $proxy = new ContainerProxy($container);

        $this->assertFalse($proxy->has('NotFound'));
    }
}
