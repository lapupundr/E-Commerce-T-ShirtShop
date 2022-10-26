<?php

declare(strict_types=1);

namespace Ecommerce\Cart\Setup;

use Ecommerce\Core\DB\DBConnection;
use Ecommerce\Core\Install\InstallInterface;

class CreateShoppingCartTable implements InstallInterface
{

    /**
     * @inheritDoc
     */
    public function install(): void
    {
        $sql = <<<SQL
CREATE TABLE shopping_cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    phpsessid VARCHAR(150) NOT NULL 
)
SQL;
        $connection = DBConnection::getConnection();
        $connection->query('DROP TABLE IF EXISTS shopping_cart');
        $connection->query($sql);

    }
}