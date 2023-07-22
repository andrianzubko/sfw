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

        /* Sources to merge (sources are absolute, targets are just filenames).
         *
         * array
         */
        $my['merger']['sources'] = [
            APP_DIR . '/assets/css/*.css' => [
                'css',
            ],
            APP_DIR . '/assets/js/*.js' => [
                'js',
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
