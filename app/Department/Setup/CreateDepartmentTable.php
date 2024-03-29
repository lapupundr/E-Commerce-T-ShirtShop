<?php
declare(strict_types=1);

namespace Ecommerce\Department\Setup;

use Ecommerce\Core\DB\DBConnection;
use Ecommerce\Core\Install\InstallInterface;

class CreateDepartmentTable implements InstallInterface
{
    /**
     * @inheritDoc
     */
    public function install(): void
    {
        $sql = <<<SQL
CREATE TABLE department (
department_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
url_key INT,
name VARCHAR(100) NOT NULL,
description VARCHAR(1000)                       
)
SQL;

        $connection = DBConnection::getConnection();
        $connection->query('DROP TABLE IF EXISTS department');
        $connection->query($sql);
    }
}