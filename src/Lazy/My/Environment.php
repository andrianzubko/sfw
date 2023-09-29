<?php

namespace App\Lazy\My;

class Environment extends \SFW\Lazy\My
{
    public function set(object $object): void
    {
        // {{{ just for example

        $object->phrase = 'Hello world!';

        // }}}
    }
}
