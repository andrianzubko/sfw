<?php

namespace App;

/**
 * Simplest framework runner.
 */
class Runner extends \SFW\Runner
{
    /**
     * Initializing additional environment.
     *
     * @throws \SFW\Exception
     */
    protected function additionalEnvironment(): void
    {
        // {{{ merge CSS and JS

        if (PHP_SAPI !== 'cli') {
            $merger = new \SFW\Merger(self::$config['my']['merger']['sources']);

            self::$e['sys']['merged'] = $merger->get();
        }

        // }}}
    }
}
