<?php

declare(strict_types=1);

namespace Ecommerce\Catalog\Setup;

use Ecommerce\Core\DB\DBConnection;
use Ecommerce\Core\Install\InstallInterface;

class CreateProductDepartmentTable implements InstallInterface
{
    /**
     * @inheritDoc
     */
    public function install(): void
    {
        $sql = <<<SQL
CREATE TABLE product_department (
product_id INT NOT NULL ,
category_id INT NOT NULL ,
PRIMARY KEY (product_id, category_id)             
)
SQL;
        $connection = DBConnection::getConnection();
        $connection->query('DROP TABLE IF EXISTS product_department');
        $connection->query($sql);
    }
}