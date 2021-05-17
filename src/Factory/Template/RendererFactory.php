<?php

declare(strict_types=1);

namespace RedBum\Factory\Template;

use BlackBonjour\ServiceManager\FactoryInterface;
use Psr\Container\ContainerInterface;
use RedBum\Configuration\DesignConfiguration;
use RedBum\Template\Renderer;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class RendererFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, string $service, array $options = []): Renderer
    {
        /** @var DesignConfiguration $designConfiguration */
        $designConfiguration = $container->get(DesignConfiguration::class);

        return new Renderer(new Environment(
            new FilesystemLoader(THEME_DIR . '/' . $designConfiguration->theme()),
            $container->get('templates'),
        ));
    }
}
