<?php

declare(strict_types=1);

namespace Ecommerce\Catalog\Setup;

use Ecommerce\Core\DB\DBConnection;
use Ecommerce\Core\Install\InstallInterface;

class CreateProductTables implements InstallInterface
{
    /**
     * @return void
     */
    public function install(): void
    {
        $sql = <<<SQL
CREATE TABLE product (
product_id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL,
description VARCHAR(1000) NOT NULL ,
short_description VARCHAR(150),
price NUMERIC(10, 2) NOT NULL ,
discounted_price NUMERIC(10, 2) NOT NULL DEFAULT 0.00,
image VARCHAR(150),
image_2 VARCHAR(150),
thumbnail VARCHAR(150),
display SMALLINT NOT NULL DEFAULT 0,
url_key VARCHAR(150) AS (LOWER(REPLACE(name, ' ', ''))),
url_key1 VARCHAR(150)  
)
SQL;
        $connection = DBConnection::getConnection();
        $connection->query('DROP TABLE IF EXISTS product');
        $connection->query($sql);
    }
}