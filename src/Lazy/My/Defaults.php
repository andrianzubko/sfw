<?php

namespace App\Lazy\My;

use App\Model;

/**
 * Lazy classes can be used as standalone classes or as glue between anything.
 */
class Defaults extends \SFW\Lazy\My
{
    /**
     * @throws \SFW\Databaser\Exception
     */
    public function init(object $object): void
    {
        if (isset($_COOKIE['SID']) && \is_string($_COOKIE['SID'])) {
            /* Passing results directly to caller object is very useful.
             */
            $object->session = (new Model\Session())->get($_COOKIE['SID']);
        } else {
            $object->session = false;
        }
    }
}
