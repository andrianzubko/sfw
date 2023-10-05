<?php

namespace App\Lazy\My;

/**
 * Lazy classes can be used as standalone classes or as glue between anything.
 */
class Environment extends \SFW\Lazy\My
{
    /**
     * @throws \SFW\Databaser\Exception
     */
    public function set(object $object): void
    {
        if (isset($_COOKIE['SID'])
            && is_string($_COOKIE['SID'])
        ) {
            /* Passing results directly to caller object is very useful.
             */
            $object->session = (new \App\Model\Session())->get($_COOKIE['SID']);
        } else {
            $object->session = false;
        }
    }
}
