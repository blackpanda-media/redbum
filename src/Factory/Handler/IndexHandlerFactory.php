<?php

declare(strict_types=1);

namespace RedBum\Factory\Handler;

use BlackBonjour\ServiceManager\FactoryInterface;
use CzProject\GitPhp\Git;
use Psr\Container\ContainerInterface;
use RedBum\Configuration\RepositoryConfiguration;
use RedBum\Handler\IndexHandler;
use RedBum\Template\Renderer;

class IndexHandlerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, string $service, array $options = []): IndexHandler
    {
        return new IndexHandler(
            $container->get(Renderer::class),
            $container->get(RepositoryConfiguration::class),
            new Git(),
        );
    }
}
