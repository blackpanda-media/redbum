<?php

use CzProject\GitPhp\Git;
use RedBum\Configuration\RepositoryConfiguration;

require_once ('../vendor/autoload.php');

// PHP settings
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'Off');
ini_set('log_errors', 'On');
ini_set('error_log', sprintf('%s/%s-error.log', '../log', date('Y-m-d')));

$config = json_decode(file_get_contents("../config.json"), true);

$repositoryConfig = new RepositoryConfiguration($config['repository']);

$git = new Git();
#$git->cloneRepository($repositoryConfig->source(), '../' . $repositoryConfig->directory());
$repo = $git->open('../' . $repositoryConfig->directory());
$repo->fetch()->pull('origin');
