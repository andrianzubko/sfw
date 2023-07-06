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
    public function get(): array
    {
        return [
            // {{{ etc

            /* Allow robots.
             *
             * bool
             */
            'robots' => false,

            /* Site name.
             *
             * string
             */
            'site_name' => 'Clean SFW',

            // }}}
        ];
    }
}
