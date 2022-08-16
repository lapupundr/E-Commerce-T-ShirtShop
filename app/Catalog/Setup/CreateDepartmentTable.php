<?php
declare(strict_types=1);

namespace Ecommerce\Catalog\Setup;

use Ecommerce\Core\DB\ConnectionInterface;
use Ecommerce\Core\Install\InstallInterface;

class CreateDepartmentTable implements InstallInterface
{
    private  ConnectionInterface $connection;

    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @inheritDoc
     */
    public function install(): void
    {
        $sql = <<<SQL
CREATE TABLE department (
department_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL,
description VARCHAR(1000)                       
)
SQL;

        $connection = $this->connection->getConnection();
        $connection->query('DROP TABLE IF EXISTS department');
        $connection->query($sql);
    }
}