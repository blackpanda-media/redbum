<?php

declare(strict_types=1);

use BlackBonjour\ServiceManager\ServiceManager;
use RedBum\Handler\IndexHandler;
use Slim\Factory\AppFactory;

require_once('../bootstrap.php');

$app = AppFactory::create(
    null,
    new ServiceManager(require CONFIG_DIR . '/services.config.php', require CONFIG_DIR . '/factories.config.php', []),
);

$app->get('/', IndexHandler::class);
$app->addErrorMiddleware(true, true, true);
$app->run();
