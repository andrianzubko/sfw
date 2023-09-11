<?php

namespace App;

/**
 * Simplest framework runner.
 */
class Runner extends \SFW\Runner
{
    /**
     * Initializing additional environment.
     *
     * @throws \SFW\Exception
     */
    protected function environment(): void
    {
        // {{{ merge css and js

        $merger = new \SFW\Merger(self::$config['my']['merger']['sources']);

        self::$e['sys']['merged'] = $merger->get(
            [
                'recheck' => self::$config['sys']['env'] !== 'prod',

                'minify' => !self::$config['sys']['debug'],
            ]
        );

        // }}}
        // {{{ this parameters only for templates!

        self::$e['sys']['request_method'] = $_SERVER['REQUEST_METHOD'];

        if (isset($_REQUEST['REQUEST_URI'])
            && is_string($_REQUEST['REQUEST_URI'])
                && mb_check_encoding($_REQUEST['REQUEST_URI'])
        ) {
            self::$e['sys']['request_uri'] = $_REQUEST['REQUEST_URI'];

            $chunks = explode('?', self::$e['sys']['request_uri'], 2);

            self::$e['sys']['request_url'] = $chunks[0];

            self::$e['sys']['request_query'] = $chunks[1] ?? '';
        } else {
            self::$e['sys']['request_uri'] = $_SERVER['REQUEST_URI'];

            self::$e['sys']['request_url'] = $_SERVER['REQUEST_URL'];

            self::$e['sys']['request_query'] = $_SERVER['REQUEST_QUERY'];
        }

        // }}}
        // {{{ detect os and device

        if (preg_match('/\b(iphone|ipad|ipod|ios|android|mobile|phone)\b/',
                strtolower($_SERVER['HTTP_USER_AGENT'] ?? ''), $M)
        ) {
            self::$e['sys']['device'] = 'mobile';

            if ($M[1] === 'android') {
                self::$e['sys']['os'] = 'android';
            } elseif (
                   $M[1] === 'mobile'
                || $M[1] === 'phone'
            ) {
                self::$e['sys']['os'] = 'winphone';
            } else {
                self::$e['sys']['os'] = 'ios';
            }
        } else {
            self::$e['sys']['device'] = 'desktop';

            self::$e['sys']['os'] = 'other';
        }

        // }}}
        // {{{ return back url

        if (isset($_REQUEST['r'])
            && is_string($_REQUEST['r'])
                && mb_check_encoding($_REQUEST['r'])
        ) {
            self::$e['sys']['r'] = $this->sys('Text')->fulltrim($_REQUEST['r'], 8192);

            if (self::$e['sys']['r'] === '') {
                self::$e['sys']['r'] = '/';
            }
        } else {
            self::$e['sys']['r'] = '/';
        }

        // }}}
    }
}
