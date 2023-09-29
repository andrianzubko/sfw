<?php

namespace App\Controller;

#[\SFW\Route('/', 'get')]
class Index extends \SFW\Controller
{
    public function __construct()
    {
        // {{{ transaction

        $this->sys('Transaction')->run("ISOLATION LEVEL REPEATABLE READ, READ ONLY", null,
            $this->body(...)
        );

        // }}}
        // {{{ template

        $this->sys('Response')->template(['phrase' => 'Hello world!'], 'index.php');

        // }}}
    }

    protected function body(): bool
    {
        return true;
    }
}
