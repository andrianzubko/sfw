<?php

namespace App\Config;

/**
 * Your config (available from everywhere).
 */
class Shared extends \SFW\Config
{
    /**
     * Returns array with config parameters.
     */
    public static function get(): array
    {
        $shared = [];

        // {{{ your shared config

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
