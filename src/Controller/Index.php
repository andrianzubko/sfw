<?php

namespace App\Controller;

class Index extends \SFW\Controller
{
    public function __construct()
    {
        // {{{ transaction

        $this->sys('Transaction')->run("ISOLATION LEVEL REPEATABLE READ, READ ONLY", null,
            $this->transactionBody(...)
        );

        // }}}
        // {{{ template

        $this->sys('Response')->template(self::$e, 'index.php');

        // }}}
    }

    protected function transactionBody(): bool
    {
        // {{{ environment

        $this->my('Environment')->get();

        // }}}

        return true;
    }
}
