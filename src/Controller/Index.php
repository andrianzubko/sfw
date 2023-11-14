<?php

namespace App\Controller;

class Index extends \App\Controller
{
    #[\SFW\AsController('/')]
    public function index(): void
    {
        $phrase = 'Hello! This is Simplest framework :)';

        self::sys('Response')->template('regular.index.html', [
            'phrase' => $phrase,
        ]);
    }
}
