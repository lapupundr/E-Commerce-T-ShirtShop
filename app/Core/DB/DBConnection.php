<?php

declare(strict_types=1);

namespace Ecommerce\Core\DB;

use mysqli;
use Throwable;

class DBConnection implements ConnectionInterface
{
    /**
     * @var mysqli|null
     */
    private static mysqli|null $connection = null;

    /**
     * @inheritDoc
     */
    public static function getConnection(): mysqli
    {
        if (self::$connection === null) {
            try {
                $connection = mysqli_connect('mysql', 'root', 'root', 't_shirt_shop');
            } catch (Throwable) {
                echo 'Unable to establish the connection to the database';
                exit();
            }
            self::$connection = $connection;
        }
        return self::$connection;
    }
}