<?php

namespace Vjik\Yii2\Psr\ContainerProxy;

use Psr\Container\ContainerInterface;
use yii\base\InvalidConfigException as Yii2InvalidConfigException;
use yii\di\Container;
use yii\di\Instance;
use yii\di\NotInstantiableException as Yii2NotInstantiableException;

class ContainerProxy implements ContainerInterface
{

    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Returns an instance by class Instance, class name, interface name or alias.
     *
     * @param string|Instance $id the class Instance, the interface or an alias name that was previously registered
     * @param array $params a list of constructor parameter values. The parameters should be provided in the order
     * they appear in the constructor declaration. If you want to skip some parameters, you should index the remaining
     * ones with the integers that represent their positions in the constructor parameter list.
     * @param array $config a list of name-value pairs that will be used to initialize the object properties.
     * @return object An instance of the requested interface.
     * @throws InvalidConfigException
     * @throws NotInstantiableException
     * @throws NotFoundException
     */
    public function get($id, array $params = [], array $config = [])
    {
        if (is_string($id) && !$this->has($id)) {
            throw new NotFoundException("No definition for $id");
        }

        try {
            return $this->container->get($id, $params, $config);
        } catch (Yii2NotInstantiableException $e) {
            throw new NotInstantiableException($e->getMessage());
        } catch (Yii2InvalidConfigException $e) {
            throw new InvalidConfigException($e->getMessage());
        }
    }

    /**
     * Returns a value indicating whether the container has the definition of the specified name.
     * @param string $id class name, interface name or alias name
     * @return bool whether the container is able to provide instance of class specified
     */
    public function has($id)
    {
        return $this->container->hasSingleton($id) ||
            $this->container->has($id) ||
            class_exists($id);
    }
}
