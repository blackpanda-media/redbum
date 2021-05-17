<?php

declare(strict_types=1);

namespace RedBum\Factory\Configuration;

use BlackBonjour\ServiceManager\FactoryInterface;
use Psr\Container\ContainerInterface;
use RedBum\Configuration\DesignConfiguration;

class DesignConfigurationFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, string $service, array $options = []): DesignConfiguration
    {
        return new DesignConfiguration($container->get('config')['design']);
    }
}
