<?php

namespace App\Config;

/**
 * System config (not available from templates).
 *
 * This config is merged with basic system config
 * and here allowed only properties from there!
 */
class Sys extends \SFW\Config
{
    /**
     * Returns array with config parameters.
     */
    public function get(): array
    {
        return array_merge((new \SFW\Config\Sys())->get(), [

        ]);
    }
}
