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
        $config = self::defaults();

        // {{{ access control

        /* List of parameter names that will be available in templates.
         *
         * array
         */
        $config['shared'] = ['env','debug'];

        // }}}
        // {{{ general

        $config['env'] = self::env('APP_ENV', $config['env']);

        $config['debug'] = self::env('APP_DEBUG', $config['debug']);

        $config['url'] = self::env('APP_URL', $config['url']);

        $config['timezone'] = 'UTC';

        // }}}
        // {{{ databaser

        $config['db_default'] = 'Pgsql';

        /* Pgsql.
         */
        $config['db_pgsql_host'] = self::env('APP_PGSQL_HOST', $config['db_pgsql_host']);

        $config['db_pgsql_port'] = self::env('APP_PGSQL_PORT', $config['db_pgsql_port']);

        $config['db_pgsql_db'] = self::env('APP_PGSQL_DB', $config['db_pgsql_db']);

        $config['db_pgsql_user'] = self::env('APP_PGSQL_USER', $config['db_pgsql_user']);

        $config['db_pgsql_pass'] = self::env('APP_PGSQL_PASS', $config['db_pgsql_pass']);

        $config['db_pgsql_persistent'] = self::env('APP_PGSQL_PERSISTENT', $config['db_pgsql_persistent']);

        /* Mysql.
         */
        $config['db_mysql_host'] = self::env('APP_MYSQL_HOST', $config['db_mysql_host']);

        $config['db_mysql_port'] = self::env('APP_MYSQL_PORT', $config['db_mysql_port']);

        $config['db_mysql_db'] = self::env('APP_MYSQL_DB', $config['db_mysql_db']);

        $config['db_mysql_user'] = self::env('APP_MYSQL_USER', $config['db_mysql_user']);

        $config['db_mysql_pass'] = self::env('APP_MYSQL_PASS', $config['db_mysql_pass']);

        $config['db_mysql_persistent'] = self::env('APP_MYSQL_PERSISTENT', $config['db_mysql_persistent']);

        // }}}
        // {{{ cacher

        $config['cacher_default'] = self::env('APP_CACHER', $config['cacher_default']);

        // }}}
        // {{{ templater

        $config['templater_default'] = 'Native';

        /* Native
         */
        $config['templater_native_minify'] = false;

        /* Twig
         */
        $config['templater_twig_strict'] = true;

        // }}}
        // {{{ notifier

        $config['notifier_enabled'] = self::env('APP_NOTIFIER', $config['notifier_enabled']);

        $config['notifier_recipients'] = self::env('APP_NOTIFIER_RECIPIENTS', $config['notifier_recipients']);

        $config['notifier_sender'] = self::env('APP_NOTIFIER_SENDER', $config['notifier_sender']);

        $config['notifier_replies'] = self::env('APP_NOTIFIER_REPLIES', $config['notifier_replies']);

        // }}}
        // {{{ merger

        $config['merger_sources']['all.css'] = APP_DIR . '/assets/css/*.css';

        $config['merger_sources']['all.js'] = APP_DIR . '/assets/js/*.js';

        // }}}
        // {{{ paginator

        $config['paginator_param'] = 'page';

        // }}}

        return $config;
    }
}
