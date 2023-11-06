<?php

namespace App\Command;

class Say extends \App\Command
{
    /**
     * For run this command use: php bin/run say:hello:world
     */
    #[\SFW\AsCommand]
    public function helloWorld(): void
    {
        echo "Hello World!\n";
    }
}
