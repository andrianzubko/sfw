<?php

namespace App\Config;

/**
 * Your config (not available from templates).
 */
class My extends \SFW\Config
{
    /**
     * Returns array with config parameters.
     */
    public static function get(): array
    {
        $my = [];

        // {{{ merger

        /* Where will be merged CSS and JS files (relative to public).
         *
         * string
         */
        $my['merger']['dir'] = '.merged';

        /* Sources to merge (sources relative to public, targets relative to merged dir).
         *
         * array
         */
        $my['merger']['sources'] = [
            '.css/primary/*.css' => [
                'all.css',
                'primary.css',
            ],
            '.css/secondary/*.css' => [
                'all.css',
                'secondary.css',
            ],
            '.js/primary/*.js' => [
                'all.js',
                'primary.js',
            ],
            '.js/secondary/*.js' => [
                'all.js',
                'secondary.js',
            ],
        ];

        // }}}
        // {{{ notifier

        /* Default sender.
         *
         * 'EMAIL' or array('EMAIL'[, 'NAME'])
         */
        $my['notifier']['sender'] = ['example@domain.com', 'Sender'];

        /* Default replies.
         *
         * array('EMAIL' or array('EMAIL'[, 'NAME']), ...)
         */
        $my['notifier']['replies'] = [];

        // }}}

        return $my;
    }
}
