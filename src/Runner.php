<?php

namespace App;

/**
 * Simplest framework runner.
 */
final class Runner extends \SFW\Runner
{
    /**
     * Initializes your environment.
     */
    protected function myEnvironment(): void
    {
        /* Put to self::$my anything you need.
         *
         * Check PHP_SELF for cli for different environments' initialization.
         */
    }
}
