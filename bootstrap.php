<?php

declare(strict_types=1);

require_once('vendor/autoload.php');

define('ROOT_DIR', __DIR__);

const CONFIG_DIR = ROOT_DIR . '/config';
const LOG_DIR = ROOT_DIR . '/log';

// PHP settings
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'Off');
ini_set('log_errors', 'On');
ini_set('error_log', sprintf('%s/%s-error.log', LOG_DIR, date('Y-m-d')));
