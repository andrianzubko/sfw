<?php

namespace App\Lazy\My;

class Environment extends \SFW\Lazy\My
{
    public function get(bool $redirect = true): void
    {
        // {{{ redirecting to basic url

        if ($redirect
            && (self::$e['sys']['url_scheme'] !== (
                    empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off'
                        ? 'http' : 'https')
               || self::$e['sys']['url_host'] !== $_SERVER['HTTP_HOST'])
        ) {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                $this->sys('Out')->redirect(self::$e['sys']['url'] . $_SERVER['REQUEST_URI']);
            } else {
                $this->sys('Out')->redirect(self::$e['sys']['url']);
            }
        }

        // }}}
        // {{{ session and etc..



        // }}}
    }
}
