<?php

declare(strict_types=1);

namespace Ecommerce\Catalog\Setup;

use Ecommerce\Core\DB\DBConnection;
use Ecommerce\Core\Install\InstallInterface;

class SetupSampleProductDepartmentData implements InstallInterface
{

    /**
     * @inheritDoc
     */
    public function install(): void
    {
        $sql = <<<SQL
INSERT INTO product_department (product_id, department_id) VALUES
       (1, 1), (2, 1), (3, 1), (4, 1), (5, 1), (6, 1), (7, 1), (8, 1), (9, 1),
       (10, 1), (11, 1), (12, 1), (13, 1), (14, 1), (15, 1), (16, 1), (17, 1),
       (18, 1), (19, 2), (20, 2), (21, 2), (22, 2), (23, 2), (24, 2), (25, 2),
       (26, 2), (27, 2), (28, 2), (29, 3), (30, 3), (31, 3), (32, 3), (33, 3),
       (34, 3), (35, 3), (36, 1), (37, 1), (38, 1), (39, 1), (40, 1), (41, 1),
       (42, 1), (43, 1), (44, 1), (45, 1), (46, 1), (47, 1), (48, 1), (49, 1),
       (50, 1), (51, 1), (52, 1), (53, 1), (54, 1), (55, 1), (56, 1), (57, 1),
       (58, 1), (59, 1), (60, 1), (61, 1), (62, 1), (63, 1), (64, 1), (81, 1),
       (97, 1), (98, 1), (65, 2), (66, 2), (67, 2), (68, 2), (69, 2), (70, 2),
       (71, 2), (72, 2), (73, 2), (74, 2), (75, 2), (76, 2), (77, 2), (78, 2),
       (79, 2), (80, 3), (81, 3), (82, 3), (83, 3), (84, 3), (85, 3), (86, 3),
       (87, 3), (88, 3), (89, 3), (90, 3), (91, 3), (92, 3), (93, 3), (94, 3),
       (95, 3), (96, 1), (99, 1), (100, 1)
SQL;
        $connection = DBConnection::getConnection();
        $connection->query($sql);
    }
}