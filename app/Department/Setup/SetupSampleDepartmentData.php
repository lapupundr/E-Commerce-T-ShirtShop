<?php

declare(strict_types=1);

namespace Ecommerce\Department\Setup;

use Ecommerce\Core\DB\DBConnection;
use Ecommerce\Core\Install\InstallInterface;

class SetupSampleDepartmentData implements InstallInterface
{
    /**
     * @inheritDoc
     */
    public function install(): void
    {
        $sql = <<<SQL
INSERT INTO department (department_id, name, description) VALUES
(1, 'Regional', 'Proud of your country? Wear a T-shirt with a national symbol stamp!'),
(2, 'Nature', 'Find beautiful T-shirts with animals and flowers in our Nature department!'),
(3, 'Seasonal', 'Each time of the year has a special flavor. Our seasonal T-shirts express traditional symbols using unique postal stamp
pictures.');
SQL;
        $connection = DBConnection::getConnection();
        $connection->query($sql);
    }
}