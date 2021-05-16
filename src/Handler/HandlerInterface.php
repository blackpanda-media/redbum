<?php

declare(strict_types=1);

namespace RedBum\Handler;

use Slim\Psr7\Request;
use Slim\Psr7\Response;

interface HandlerInterface
{
    public function __invoke(Request $request, Response $response): Response;
}
