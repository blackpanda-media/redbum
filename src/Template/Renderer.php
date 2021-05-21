<?php

declare(strict_types=1);

namespace RedBum\Template;

use Parsedown;
use RedBum\Data\DataProvider;
use Slim\Psr7\Response;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class Renderer
{
    /** @var Environment */
    private $twig;

    /** @var DataProvider */
    private $dataProvider;

    /** @var Parsedown */
    private $parseDown;

    public function __construct(Environment $twig, DataProvider $dataProvider, Parsedown $parsedown)
    {
        $this->twig = $twig;
        $this->dataProvider = $dataProvider;
        $this->parseDown = $parsedown;
    }

    public function withContext(array $context): self
    {
        $this->dataProvider->addContext($context);
        return $this;
    }

    public function render(Response $response, string $templateName): Response
    {
        try {
            $renderedContent = $this->twig->render($templateName, $this->dataProvider->context());
        } catch (LoaderError | RuntimeError | SyntaxError $exception) {
            $renderedContent = 'Error with rendering template: ' . $exception->getMessage();
        }

        $response->getBody()->write($this->parseDown->parse($renderedContent));

        return $response;
    }
}
