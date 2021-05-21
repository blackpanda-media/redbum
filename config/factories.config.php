<?php

declare(strict_types=1);

return [
    RedBum\Configuration\DesignConfiguration::class => RedBum\Factory\Configuration\DesignConfigurationFactory::class,
    RedBum\Configuration\ProjectConfiguration::class => RedBum\Factory\Configuration\ProjectConfigurationFactory::class,
    RedBum\Configuration\RepositoryConfiguration::class => RedBum\Factory\Configuration\RepositoryConfigurationFactory::class,
    RedBum\Configuration\SettingsConfiguration::class => RedBum\Factory\Configuration\SettingsConfigurationFactory::class,

    RedBum\Handler\IndexHandler::class => RedBum\Factory\Handler\IndexHandlerFactory::class,
    RedBum\Template\Renderer::class => RedBum\Factory\Template\RendererFactory::class,
];
