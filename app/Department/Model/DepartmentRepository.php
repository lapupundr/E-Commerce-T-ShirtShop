<?php

declare(strict_types=1);

namespace Ecommerce\Department\Model;

use Ecommerce\Core\DB\Sql\Select;
use Ecommerce\Core\DB\Sql\Where;

class DepartmentRepository implements DepartmentRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getList(): array
    {
        $select = new Select();
        return $select->selectAll('department');
    }

    /**
     * @inheritDoc
     */
    public function get(int $departmentId): array
    {
        $select = new Select();
        $where = new Where(['department_id', $departmentId, '=']);
        return $select->selectAll('department', $where);
    }
}