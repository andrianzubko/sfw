<?php

namespace App\Config;

/**
 * Your configuration (available from everywhere).
 */
class Shared extends \SFW\Config
{
    /**
     * Returns array with configuration parameters.
     */
    public static function get(): array
    {
        $shared = [];

        // {{{ general

        /* Allow robots.
         *
         * bool
         */
        $shared['robots'] = self::env('APP_ROBOTS', false);

        /* Application name.
         *
         * string
         */
        $shared['name'] = 'Simplest framework';

        // }}}

        return $shared;
    }
}
