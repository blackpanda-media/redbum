<?php

declare(strict_types=1);

namespace RedBum\Handler;

use CzProject\GitPhp\Git;
use CzProject\GitPhp\GitException;
use RedBum\Configuration\RepositoryConfiguration;
use RedBum\Constant\Template;
use RedBum\Template\Renderer;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class IndexHandler implements HandlerInterface
{
    /** @var Renderer */
    private $renderer;

    /** @var RepositoryConfiguration */
    private $repositoryConfiguration;

    /** @var Git */
    private $git;

    public function __construct(Renderer $renderer, RepositoryConfiguration $repositoryConfiguration, Git $git)
    {
        $this->renderer = $renderer;
        $this->repositoryConfiguration = $repositoryConfiguration;
        $this->git = $git;
    }

    public function __invoke(Request $request, Response $response): Response
    {
        $gitDir = ROOT_DIR . '/' . $this->repositoryConfiguration->directory();

        $repo = $this->git->open($gitDir);
        $content = null;
        try {
            $repo->fetch()->pull('origin');
        } catch (GitException $exception) {
            $content = $exception->getMessage();
        }

        if ($content === null) {
            $content = file_get_contents($gitDir . '/' . $request->getAttribute('path') . '/index.md');
        }

        return $this->renderer
            ->withContext([
                'topic_content' => empty($content) ? 'Cannot find data.' : $content,
            ])
            ->render($response, Template::INDEX);
    }
}
