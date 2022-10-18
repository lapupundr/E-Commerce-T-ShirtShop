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
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
product_id INT NOT NULL,
department_id INT NOT NULL,
UNIQUE (product_id, department_id)             
)
SQL;
        $connection = DBConnection::getConnection();
        $connection->query('DROP TABLE IF EXISTS product_department');
        $connection->query($sql);
    }
}