<?php

namespace App;

/**
 * Simplest framework runner.
 */
class Runner extends \SFW\Runner
{
    /**
     * Initializing additional environment.
     */
    protected function environment(): void
    {
        // {{{ merge css and js

        $merger = new \SFW\Merger('.merged');

        if (self::$config['my']['recombine_css_and_js']) {
            $merger->recombine(
                [
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
                ]
            );
        }

        self::$e['defaults']['merged'] = $merger->get();

        // }}}
    }
}
