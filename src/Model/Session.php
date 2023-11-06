<?php

namespace App\Model;

class Session extends \App\Model
{
    /**
     * @throws \SFW\Exception
     */
    public function get(string $sid): array|false
    {
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

            /* Result values of types: int, float, bool, json and null, are automatically converted to native PHP types.
             */
            return $result->fetchAssoc();
        }

        return false;
    }
}
