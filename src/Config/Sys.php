<?php

namespace App\Config;

/**
 * System configuration overrides.
 */
class Sys extends \SFW\Config\Sys
{
    /**
     * If you need some of these parameters to be available in templates, list them in 'shared' parameter.
     */
    public static function init(): array
    {
        $sys = self::defaults();

        // {{{ access control

        /* List of parameter names that will be available in templates.
         *
         * array
         */
        $sys['shared'] = ['env','debug'];

        // }}}
        // {{{ general

        $sys['env'] = self::env('APP_ENV', $sys['env']);

        $sys['debug'] = self::env('APP_DEBUG', $sys['debug']);

        $sys['url'] = self::env('APP_URL', $sys['url']);

        $sys['timezone'] = 'UTC';

        // }}}
        // {{{ databaser

        $sys['db_default'] = 'Pgsql';

        /* Pgsql.
         */
        $sys['db_pgsql_host'] = self::env('APP_PGSQL_HOST', $sys['db_pgsql_host']);

        $sys['db_pgsql_port'] = self::env('APP_PGSQL_PORT', $sys['db_pgsql_port']);

        $sys['db_pgsql_db'] = self::env('APP_PGSQL_DB', $sys['db_pgsql_db']);

        $sys['db_pgsql_user'] = self::env('APP_PGSQL_USER', $sys['db_pgsql_user']);

        $sys['db_pgsql_pass'] = self::env('APP_PGSQL_PASS', $sys['db_pgsql_pass']);

        $sys['db_pgsql_persistent'] = self::env('APP_PGSQL_PERSISTENT', $sys['db_pgsql_persistent']);

        /* Mysql.
         */
        $sys['db_mysql_host'] = self::env('APP_MYSQL_HOST', $sys['db_mysql_host']);

        $sys['db_mysql_port'] = self::env('APP_MYSQL_PORT', $sys['db_mysql_port']);

        $sys['db_mysql_db'] = self::env('APP_MYSQL_DB', $sys['db_mysql_db']);

        $sys['db_mysql_user'] = self::env('APP_MYSQL_USER', $sys['db_mysql_user']);

        $sys['db_mysql_pass'] = self::env('APP_MYSQL_PASS', $sys['db_mysql_pass']);

        $sys['db_mysql_persistent'] = self::env('APP_MYSQL_PERSISTENT', $sys['db_mysql_persistent']);

        // }}}
        // {{{ cacher

        $sys['cacher_default'] = self::env('APP_CACHER', $sys['cacher_default']);

        // }}}
        // {{{ templater

        $sys['templater_default'] = 'Native';

        /* Native
         */
        $sys['templater_native_minify'] = false;

        /* Twig
         */
        $sys['templater_twig_strict'] = true;

        // }}}
        // {{{ notifier

        $sys['notifier_enabled'] = self::env('APP_NOTIFIER', $sys['notifier_enabled']);

        $sys['notifier_recipients'] = self::env('APP_NOTIFIER_RECIPIENTS', $sys['notifier_recipients']);

        $sys['notifier_sender'] = self::env('APP_NOTIFIER_SENDER', $sys['notifier_sender']);

        $sys['notifier_replies'] = self::env('APP_NOTIFIER_REPLIES', $sys['notifier_replies']);

        // }}}
        // {{{ merger

        $sys['merger_sources']['all.css'] = APP_DIR . '/assets/css/*.css';

        $sys['merger_sources']['all.js'] = APP_DIR . '/assets/js/*.js';

        // }}}
        // {{{ paginator

        $sys['paginator_param'] = 'page';

        // }}}

        return $sys;
    }
}
