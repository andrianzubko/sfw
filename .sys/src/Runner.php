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

        if (self::$config['sys']['env'] !== 'prod') {
            $merger->recombine(
                self::$config['my']['merger']['sources'],
                    !self::$config['sys']['debug']
            );
        }

        self::$e['defaults']['merged'] = $merger->get();

        // }}}
    }
}
