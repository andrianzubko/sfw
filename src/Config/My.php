<?php

namespace App\Config;

/**
 * Your configuration.
 */
class My extends \SFW\Config\My
{
    /**
     * If you need some of these parameters to be available in templates, list them in 'shared' parameter.
     */
    public static function init(): array
    {
        $config = [];

        // {{{ access control

        /* List of parameter names that will be available in templates.
         *
         * array
         */
        $config['shared'] = ['robots','name'];

        // }}}
        // {{{ general

        /* Allow robots.
         *
         * bool
         */
        $config['robots'] = self::env('APP_ROBOTS', false);

        /* Application name.
         *
         * string
         */
        $config['name'] = 'Simplest framework';

        // }}}

        return $config;
    }
}
