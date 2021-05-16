<?php

declare(strict_types=1);

namespace RedBum\Factory\Handler;

use BlackBonjour\ServiceManager\FactoryInterface;
use Psr\Container\ContainerInterface;
use RedBum\Handler\IndexHandler;

class IndexHandlerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, string $service, array $options = [])
    {
        return new IndexHandler();
    }
}
