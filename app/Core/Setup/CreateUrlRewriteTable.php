<?php

declare(strict_types=1);

namespace Ecommerce\Core\Setup;

use Ecommerce\Core\DB\DBConnection;
use Ecommerce\Core\Install\InstallInterface;

class CreateUrlRewriteTable implements InstallInterface

{

    /**
     * @inheritDoc
     */
    public function install(): void
    {
        $sql = <<<SQL
CREATE TABLE url_rewrite (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
request_url VARCHAR(100) NOT NULL,
controller_name VARCHAR(100) NOT NULL,
properties VARCHAR(1000)                       
)
SQL;

        $connection = DBConnection::getConnection();
        $connection->query('DROP TABLE IF EXISTS url_rewrite');
        $connection->query($sql);
    }
}