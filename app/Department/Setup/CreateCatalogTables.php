<?php

declare(strict_types=1);

namespace Ecommerce\Catalog\Setup;

use Ecommerce\Core\DB\DBConnection;
use Ecommerce\Core\Install\InstallInterface;

class CreateCatalogTables implements InstallInterface
{
    /**
     * @return void
     */
    public function install(): void
    {
        $sql = <<<SQL
CREATE TABLE catalog_product (
id INT AUTO_INCREMENT PRIMARY KEY,
product_name VARCHAR(255) NOT NULL                      
)
SQL;
        $connection = DBConnection::getConnection();
        $connection->query('DROP TABLE IF EXISTS catalog_product');
        $connection->query($sql);
    }
}