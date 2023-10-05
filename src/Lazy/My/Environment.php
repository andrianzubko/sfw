<?php

namespace App\Lazy\My;

/**
 * All lazy classes can be used as standalone classes or as glue between anything.
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
            // Passing results directly to caller object is optional, but very useful
            // when you need to pass many of them in one method.
            $object->session = (new \App\Model\Session())->get($_COOKIE['SID']);
        } else {
            $object->session = false;
        }
    }
}
