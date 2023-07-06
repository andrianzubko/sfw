<?php

namespace App\Config;

/**
 * System config (not available from templates).
 *
 * This config is merged with basic system config
 * and here allowed only properties from there!
 */
class Sys extends \SFW\Config
{
    /**
     * Returns array with config parameters.
     */
    public function get(): array
    {
        return array_merge((new \SFW\Config\Sys())->get(), [
            // {{{ frontend

            /* Basic url of site (autodetect if not set).
             *
             * ?string
             */
            'basic_url' => null,

            /* Recombine css and js files (always disable at production).
             *
             * bool
             */
            'recombine_css_and_js' => true,

            /* Add statistics to each page generated by template.
             *
             * bool
             */
            'add_stats_to_page' => true,

            /* Name of page param in url for paginator.
             *
             * string
             */
            'param_for_paginator' => 'page',

            // }}}
            // {{{ database

            /* Default database driver Mysql or Pgsql (can be changed at runtime).
             *
             * string
             */
            'db' => 'Pgsql',

            /* How many times to retry failed transactions with expected sql states.
             *
             * int
             */
            'db_transactions_retries' => 7,

            /* Log transactions fails.
             *
             * ?string
             */
            'db_transactions_fails_log' => APP_DIR . '/log/transactions.fails.log',

            /* Log slow queries.
             *
             * ?string
             */
            'db_slow_queries_log' => APP_DIR . '/log/slow.queries.log',

            /* Log slow queries with minimal time.
             *
             * float
             */
            'db_slow_queries_min' => 0.5,

            /* PostgreSQL.
             *
             * array
             */
            'pgsql' => [
                /* string
                 */
                'connection' => null,

                /* string
                 */
                'encoding' => null,

                /* bool
                 */
                'persistent' => false,
            ],

            /* MySQL.
             *
             * array
             */
            'mysql' => [
                /* ?string
                 */
                'hostname' => null,

                /* ?string
                 */
                'username' => null,

                /* ?string
                 */
                'password' => null,

                /* ?string
                 */
                'database' => null,

                /* ?int
                 */
                'port' => null,

                /* ?string
                 */
                'socket' => null,

                /* ?string
                 */
                'charset' => null,
            ],

            // }}}
            // {{{ cache

            /* Default cache Apc or Memcached (can be changed at runtime).
             *
             * string
             */
            'cache' => 'Apc',

            /* Apc.
             *
             * array
             */
            'apc' => [
                /* int
                 */
                'ttl' => 3600,

                /* ?string
                 */
                'ns' => null,
            ],

            /* Memcached.
             *
             * array
             */
            'memcached' => [
                /* int
                 */
                'ttl' => 3600,

                /* ?string
                 */
                'ns' => null,

                /* ?array(KEY => VALUE, ...)
                 */
                'options' => null,

                /* ?array(array('HOST', PORT), ...)
                 */
                'servers' => null,
            ],

            // }}}
            // {{{ mail

            /* Enable mailer.
             *
             * If disabled, then no emails will be sent, but build() method in Notify classes will be called anyway.
             *
             * bool
             */
            'mailer' => true,

            /* Instead of disabling, you can override recipients by your email.
             *
             * array('EMAIL' or array('EMAIL'[, 'NAME']), ...)
             */
            'mailer_override_recipients' => [],

            // }}}
            // {{{ time

            /* Default timezone.
             *
             * string
             */
            'timezone' => 'Europe/Moscow',

            // }}}
        ]);
    }
}
