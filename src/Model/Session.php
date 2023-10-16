<?php

namespace App\Model;

class Session extends \App\Model
{
    /**
     * @throws \SFW\Databaser\Exception
     */
    public function get(string $sid): array|false
    {
        /* This is just example and therefore disabled.
         */
        if (0) {
            /* There is no ORM built-in, only raw SQL.
             */
            $result = self::sys('Db')->query(
                sprintf("
                    SELECT *
                      FROM sessions
                     WHERE sid = %s",
                    self::sys('Db')->string($sid)
                )
            );

            /* At any fetches json fields will be automatically extracted to arrays.
             */
            return $result->fetchAssoc();
        }

        return false;
    }
}
