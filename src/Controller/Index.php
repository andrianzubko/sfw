<?php

namespace App\Controller;

#[\SFW\Route('/', 'get')]
class Index extends \SFW\Controller
{
    public function __construct()
    {
        // {{{ transaction

        $this->sys('Transaction')->run($this->body(...));

        // }}}
        // {{{ response

        $this->sys('Response')->template('regular.index.html', $this);

        // }}}
    }

    protected function body(): bool
    {
        // {{{ environment

        $this->my('Environment')->set($this);

        // }}}

        return true;
    }
}
