<?php

namespace App\Controller;

class SitemapXml extends \SFW\Controller
{
    public function __construct()
    {
        // {{{ transaction

        $this->sys('Transaction')->run("ISOLATION LEVEL REPEATABLE READ, READ ONLY", null,
            fn() => $this->transactionBody()
        );

        // }}}
        // {{{ making sitemap

        $this->sitemap = new \SimpleXMLElement(
            '<?xml version="1.0" encoding="utf-8"?><urlset />'
        );

        $this->sitemap['xmlns'] = 'https://www.sitemaps.org/schemas/sitemap/0.9';

        $this->sitemap->addChild('url')->loc = self::$e['sys']['url'];

        // }}}
        // {{{ output

        $this->sys('Response')->inline($this->sitemap->asXML(), 'text/xml');

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
