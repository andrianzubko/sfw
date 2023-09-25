<?php

namespace App\Lazy\My;

/**
 * @mixin \App\Model\Environment
 */
class Environment extends \SFW\Lazy\My
{
    public function getInstance(): object
    {
        return new \App\Model\Environment();
    }
}
