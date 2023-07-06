<?php

ini_set('display_errors', php_sapi_name() === 'cli');

ini_set('error_reporting', -1);

ini_set('ignore_user_abort', true);

define('APP_DIR', dirname(__DIR__) . '/.sys');

define('PUB_DIR', dirname(__DIR__));

require APP_DIR . '/vendor/autoload.php';

new App\Runner();
