<?php

declare(strict_types=1);

namespace RedBum\Factory\Configuration;

use BlackBonjour\ServiceManager\FactoryInterface;
use Psr\Container\ContainerInterface;
use RedBum\Configuration\RepositoryConfiguration;

class RepositoryConfigurationFactory implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        string $service,
        array $options = []
    ): RepositoryConfiguration {
        return new RepositoryConfiguration($$container->get('config')['repository']);
    }
}
