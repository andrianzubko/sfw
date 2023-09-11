<?php

namespace App\Lazy\My;

class Environment extends \SFW\Lazy\My
{
    public function get(bool $redirect = true): void
    {
        // {{{ redirecting to basic url

        if ($redirect
            && (self::$e['sys']['url_scheme'] !== $_SERVER['HTTP_SCHEME']
               || self::$e['sys']['url_host'] !== $_SERVER['HTTP_HOST'])
        ) {
            $this->sys('Response')->redirect(
                $_SERVER['REQUEST_METHOD'] !== 'POST'
                    ? self::$e['sys']['url'] . $_SERVER['REQUEST_URI']
                    : self::$e['sys']['url']
            );
        }

        // }}}
        // {{{ session and etc..

        // }}}
    }
}
