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
    public function get(): array
    {
        return [
            // {{{ frontend

            /* Recombine css and js files (always disable at production).
             *
             * bool
             */
            'recombine_css_and_js' => true,

            // }}}
            // {{{ mail

            /* Mailer default sender.
             *
             * 'EMAIL' or array('EMAIL'[, 'NAME'])
             */
            'mailer_default_sender' => ['example@domain.com', 'Sender'],

            /* Mailer default replies.
             *
             * array('EMAIL' or array('EMAIL'[, 'NAME']), ...)
             */
            'mailer_default_replies' => [],

            // }}}
        ];
    }
}
