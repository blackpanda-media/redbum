<?php

declare(strict_types=1);

namespace RedBum\Handler;

use Slim\Psr7\Request;
use Slim\Psr7\Response;

class IndexHandler implements HandlerInterface
{
    public function __invoke(Request $request, Response $response): Response
    {
        #$config = json_decode(file_get_contents("../config.json"), true);
        #$repositoryConfig = new RepositoryConfiguration($config['repository']);
        #$git = new Git();
        #$git->cloneRepository($repositoryConfig->source(), '../' . $repositoryConfig->directory());
        #$repo = $git->open('../' . $repositoryConfig->directory());
        #$repo->fetch()->pull('origin');

        echo 'foo';
        return $response;
    }
}
