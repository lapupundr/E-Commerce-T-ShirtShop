<?php

declare(strict_types=1);

namespace Ecommerce\Core\Setup;

use Ecommerce\Core\DB\DBConnection;
use Ecommerce\Core\Install\InstallInterface;

class SetupSampleUrlRewriteData implements InstallInterface
{

    /**
     * @inheritDoc
     */
    public function install(): void
    {
        $sql = <<<SQL
INSERT INTO url_rewrite (request_url, controller_name, properties) VALUES
('regional', '/Ecommerce/Department/Controller/Listing', '{"id": 1, "color": "black"}' ),
('nature', '/Ecommerce/Department/Controller/Listing', '{"id": 2, "color": "white"}'),
('seasonal', '/Ecommerce/Department/Controller/Listing', '{"id": 3, "color": "gray"}');
SQL;
        $connection = DBConnection::getConnection();
        $connection->query($sql);
    }
}