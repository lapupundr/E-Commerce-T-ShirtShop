<?php

declare(strict_types=1);

namespace Ecommerce\Catalog\Model;

use Ecommerce\Core\DB\Sql\Select;

class GetDepartments
{
    /**
     * @return array
     */
    public function getDepartments(): array
    {
        $select = new Select();
        $result = $select->selectAll('department');

        return $result;
    }
}