<?php

return [
    'APP_ENV' => 'dev',

    'APP_DEBUG' => false,

    'APP_URL' => null,

    'APP_ROBOTS' => false,

    'APP_DB_PGSQL_HOST' => 'localhost',
    'APP_DB_PGSQL_PORT' => 5432,
    'APP_DB_PGSQL_DB' => null,
    'APP_DB_PGSQL_USER' => null,
    'APP_DB_PGSQL_PASS' => null,
    'APP_DB_PGSQL_PERSISTENT' => false,

    'APP_DB_MYSQL_HOST' => 'localhost',
    'APP_DB_MYSQL_PORT' => 3306,
    'APP_DB_MYSQL_DB' => null,
    'APP_DB_MYSQL_USER' => null,
    'APP_DB_MYSQL_PASS' => null,
    'APP_DB_MYSQL_PERSISTENT' => false,

    'APP_CACHER' => 'Apc',

    'APP_NOTIFIER' => true,
    'APP_NOTIFIER_RECIPIENTS' => null,
    'APP_NOTIFIER_SENDER' => 'sender@domain.com',
    'APP_NOTIFIER_REPLIES' => null,

    ...$_SERVER
];
