<?php

namespace App\Config;

/**
 * System config (not available from templates).
 *
 * Only override needed parameters from basic system config.
 * Don't add here your own new parameters!
 */
class Sys extends \SFW\Config
{
    /**
     * Returns array with config parameters.
     */
    public static function get(): array
    {
        $sys = \SFW\Config\Sys::get();

        // {{{ general

        $sys['env'] = self::env('APP_ENV', $sys['env']);

        $sys['debug'] = self::env('APP_DEBUG', $sys['debug']);

        $sys['url'] = self::env('APP_URL', $sys['url']);

        $sys['timezone'] = 'UTC';

        // }}}
        // {{{ databaser

        $sys['db']['default'] = 'Pgsql';

        /* Pgsql.
         */
        $sys['db']['pgsql']['host'] = self::env('APP_PGSQL_HOST', $sys['db']['pgsql']['host']);

        $sys['db']['pgsql']['port'] = self::env('APP_PGSQL_PORT', $sys['db']['pgsql']['port']);

        $sys['db']['pgsql']['db'] = self::env('APP_PGSQL_DB', $sys['db']['pgsql']['db']);

        $sys['db']['pgsql']['user'] = self::env('APP_PGSQL_USER', $sys['db']['pgsql']['user']);

        $sys['db']['pgsql']['pass'] = self::env('APP_PGSQL_PASS', $sys['db']['pgsql']['pass']);

        $sys['db']['pgsql']['persistent'] = self::env('APP_PGSQL_PERSISTENT', $sys['db']['pgsql']['persistent']);

        /* Mysql.
         */
        $sys['db']['mysql']['host'] = self::env('APP_MYSQL_HOST', $sys['db']['mysql']['host']);

        $sys['db']['mysql']['port'] = self::env('APP_MYSQL_PORT', $sys['db']['mysql']['port']);

        $sys['db']['mysql']['db'] = self::env('APP_MYSQL_DB', $sys['db']['mysql']['db']);

        $sys['db']['mysql']['user'] = self::env('APP_MYSQL_USER', $sys['db']['mysql']['user']);

        $sys['db']['mysql']['pass'] = self::env('APP_MYSQL_PASS', $sys['db']['mysql']['pass']);

        $sys['db']['mysql']['persistent'] = self::env('APP_MYSQL_PERSISTENT', $sys['db']['mysql']['persistent']);

        // }}}
        // {{{ cacher

        $sys['cacher']['default'] = self::env('APP_CACHER', $sys['cacher']['default']);

        // }}}
        // {{{ templater

        $sys['templater']['default'] = 'Native';

        /* Native
         */
        $sys['templater']['native']['minify'] = false;

        /* Twig
         */
        $sys['templater']['twig']['minify'] = false;

        $sys['templater']['twig']['strict'] = true;

        // }}}
        // {{{ notifier

        $sys['notifier']['enabled'] = self::env('APP_NOTIFIER', $sys['notifier']['enabled']);

        $sys['notifier']['recipients'] = self::env('APP_NOTIFIER_RECIPIENTS', $sys['notifier']['recipients']);

        $sys['notifier']['sender'] = self::env('APP_NOTIFIER_SENDER', $sys['notifier']['sender']);

        $sys['notifier']['replies'] = self::env('APP_NOTIFIER_REPLIES', $sys['notifier']['replies']);

        // }}}
        // {{{ merger

        $sys['merger']['sources']['all.css'] = APP_DIR . '/assets/css/*.css';

        $sys['merger']['sources']['all.js'] = APP_DIR . '/assets/js/*.js';

        // }}}
        // {{{ paginator

        $sys['paginator']['param'] = 'page';

        // }}}

        return $sys;
    }
}
