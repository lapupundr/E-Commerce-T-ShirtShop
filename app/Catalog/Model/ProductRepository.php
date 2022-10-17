<?php

declare(strict_types=1);

namespace Ecommerce\Catalog\Model;

use Ecommerce\Core\DB\Sql\Join;
use Ecommerce\Core\DB\Sql\Select;
use Ecommerce\Core\DB\Sql\Where;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function getList(int $departmentId): array
    {
        $join = new Join();
        $where = new Where(['department_id', $departmentId, '=']);
        $res = $join->innerJoin(
            'product',
            'product_department',
            'product.product_id',
            'product_department.product_id',
            $where
        );
        return $res;
    }

    /**
     * @inheritDoc
     */
    public function get(int $productId): array
    {
        $select = new Select();
        $where = new Where(['product_id', $productId, '=']);
        return $select->selectAll('product', $where);
    }
}