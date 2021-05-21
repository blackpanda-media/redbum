<?php

declare(strict_types=1);

namespace RedBum\Factory\Configuration;

use BlackBonjour\ServiceManager\FactoryInterface;
use Psr\Container\ContainerInterface;
use RedBum\Configuration\ProjectConfiguration;
use RedBum\Configuration\SettingsConfiguration;

class ProjectConfigurationFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, string $service, array $options = []): ProjectConfiguration
    {
        return new ProjectConfiguration(
            $container->get('config')['project'],
            $container->get(SettingsConfiguration::class),
        );
    }
}
