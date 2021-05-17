<?php

declare(strict_types=1);

namespace RedBum\Template;

use Slim\Psr7\Response;
use Twig\Environment;

class Renderer
{
    /** @var Environment */
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function render(Response $response, string $templateName): Response
    {
        $response->getBody()->write($this->twig->render($templateName));

        return $response;
    }
}
