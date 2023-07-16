<?php

ini_set('display_errors', PHP_SAPI === 'cli');

ini_set('error_reporting', -1);

ini_set('ignore_user_abort', true);

define('APP_DIR', dirname(__DIR__, 2));

require APP_DIR . '/vendor/autoload.php';

new App\Runner();
