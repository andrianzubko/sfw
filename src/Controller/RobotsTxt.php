<?php

namespace App\Controller;

class RobotsTxt extends \SFW\Controller
{
    public function __construct()
    {
        // {{{ transaction

        $this->sys('Transaction')->run("ISOLATION LEVEL REPEATABLE READ, READ ONLY", null,
            fn() => $this->transactionBody()
        );

        // }}}
        // {{{ making robots.txt

        $this->robots = [];

        $this->robots[] = 'User-agent: *';

        if (self::$config['shared']['robots']) {
            $this->robots[] = 'Allow: /';
        } else {
            $this->robots[] = 'Disallow: /';
        }

        $this->robots[] = sprintf('Host: %s',
            self::$e['sys']['url']
        );

        if (self::$config['shared']['robots']) {
            $this->robots[] = sprintf('Sitemap: %s/sitemap.xml',
                self::$e['sys']['url']
            );
        }

        // }}}
        // {{{ output

        $this->sys('Out')->inline(implode("\n", $this->robots) . "\n");

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
