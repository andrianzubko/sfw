<?php

namespace App;

/**
 * Router.
 */
class Router extends \SFW\Router
{
    /**
     * Route from request url to Controller class.
     */
    public function get(): string|false
    {
        if (!preg_match('~^(?:[\-/.][a-z\d]+)*/?$~i', $_SERVER['REQUEST_URL'])) {
            return false;
        }

        $i = 0;

        $controller = [];

        foreach (explode('/', $_SERVER['REQUEST_URL']) as $chunk) {
            if ($chunk === '') {

            } elseif (
                preg_match('/^
                    (?:
                        \d+
                        |
                        [a-z\d]{32}
                        |
                        [a-f\d]{8}-[a-f\d]{4}-[a-f\d]{4}-[a-f\d]{4}-[a-f\d]{12}
                    )
                    $/ix', $chunk)
            ) {
                $name = $i++ ? 'i' . $i : 'id';

                $_REQUEST[$name] = $_GET[$name] = $chunk;
            } else {
                foreach (preg_split('/\W/', $chunk) as $subChunk) {
                    $controller[] = ucfirst($subChunk);
                }
            }
        }

        if (!$controller) {
            return 'Index';
        }

        $controller = implode($controller);

        return $controller === 'Index' ? false : $controller;
    }
}
