<?php

define('APP_DIR', dirname(__DIR__, 2));

require APP_DIR . '/vendor/autoload.php';

new App\Runner();
