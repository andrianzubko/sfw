<?php

namespace App\Command;

class SayHello extends \SFW\Command
{
    public function __construct()
    {
        echo "Hello!\n";
    }
}
