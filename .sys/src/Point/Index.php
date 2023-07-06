<?php

namespace App\Point;

class Index extends \SFW\Point
{
    public function __construct()
    {
        // {{{ transaction

        $this->sys('Transaction')->run("ISOLATION LEVEL REPEATABLE READ, READ ONLY", null,
            fn() => $this->transactionBody()
        );

        // }}}
        // {{{ template

        $this->sys('Out')->template(self::$e, 'index.php');

        // }}}
    }

    protected function transactionBody(): bool
    {
        // {{{ environment

        $this->my('Environment')->get();

        // }}}
        // {{{ example query

        //$result = $this->sys('Db')->query(
        //    sprintf("
        //        SELECT %s",
        //            $this->sys('Db')->number(1)
        //    )
        //);
        //
        //self::$e['something'] = $result->fetchAll();

        // }}}
        // {{{ example message

        //$this->sys('Notifier')->add(
        //    new \App\Notify\Example('your@mail.com', 'Hello!')
        //);

        // }}}

        return true;
    }
}
