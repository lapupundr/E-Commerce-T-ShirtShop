<?php

declare(strict_types=1);

namespace Ecommerce\Core\DB\Sql;

use Ecommerce\Core\DB\ConnectionInterface;

class GetDepartments
{
    public function getDepartments(): array
    {
        $select = new Select();

        return $select->select('department');
    }

}