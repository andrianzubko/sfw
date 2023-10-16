<?php

namespace App\Command;

/**
 * For run this command use: php bin/run say:hello
 */
class SayHello extends \App\Command
{
    public function __construct()
    {
        echo "Hello!\n";
    }
}
