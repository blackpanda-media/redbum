<?php

declare(strict_types=1);

namespace RedBum\Template;

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

    /** @var ?DataProvider */
    private $dataProvider;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
        $this->dataProvider = new DataProvider();
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

        $response->getBody()->write($renderedContent);

        return $response;
    }
}
