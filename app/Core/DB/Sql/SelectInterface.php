<?php
declare(strict_types=1);

namespace Ecommerce\Core\DB\Sql;

interface SelectInterface
{
    /**
     * Retrieve the data from database.
     *
     * @param string $table
     * @param array $where ['field_name' => 'value']
     * @param string $condition can be 'eq', 'like'
     * @return string[]
     */
    public function select(string $table, array $where = [], string $condition = 'eq'): array;
}