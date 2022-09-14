<?php

declare(strict_types=1);

namespace Ecommerce\Catalog\Model;

use Ecommerce\Core\DB\Sql\Select;

class DepartmentRepository implements DepartmentRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getList(): array
    {
        $select = new Select();
        $result = $select->selectAll('department');

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function get(int $departmentId): array
    {
        // TODO: Implement get() method.
    }
}