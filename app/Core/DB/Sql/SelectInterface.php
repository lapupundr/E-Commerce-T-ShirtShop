<?php
declare(strict_types=1);

namespace Ecommerce\Core\DB\Sql;

interface SelectInterface
{
    /**
     * Retrieve the data from database.
     *
     * @param string $table
     * @param WhereInterface|null $where ['field' => '', 'value' => '', 'condition' => '=']]
     * @return string[]
     */
    public function select(string $table, ?WhereInterface $where): array;
}