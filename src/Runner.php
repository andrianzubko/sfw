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
    protected function environment(): void
    {
        // {{{ merge css and js

        $merger = new \SFW\Merger(self::$config['my']['merger']['sources']);

        self::$e['sys']['merged'] = $merger->get(
            [
                'recheck' => self::$config['sys']['env'] !== 'prod',

                'minify' => !self::$config['sys']['debug'],
            ]
        );

        // }}}
    }
}
