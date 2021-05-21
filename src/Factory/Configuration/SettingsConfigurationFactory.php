<?php

declare(strict_types=1);

namespace RedBum\Factory\Configuration;

use BlackBonjour\ServiceManager\FactoryInterface;
use Psr\Container\ContainerInterface;
use RedBum\Configuration\SettingsConfiguration;

class SettingsConfigurationFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, string $service, array $options = []): SettingsConfiguration
    {
        return new SettingsConfiguration($container->get('config')['project']['settings']);
    }
}
