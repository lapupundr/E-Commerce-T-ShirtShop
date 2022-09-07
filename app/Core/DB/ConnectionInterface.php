<?php

declare(strict_types=1);

namespace Ecommerce\Core\DB;

use mysqli;

interface ConnectionInterface
{
    /**
     * Retrieves mysql connection.
     *
     * @return mysqli
     */
    public static function getConnection(): mysqli;
}