<?php

declare(strict_types=1);

namespace Ecommerce\Core\DB\Sql;

interface JoinInterface
{
    /**
     * Retrieve the data from database using JOIN 2 tables.
     *
     * @param string $table1
     * @param string $table2
     * @param string $value1
     * @param string $value2
     * @param WhereInterface|null $where ['field' => '', 'value' => '', 'condition' => '=']]
     * @return string[][]
     */
    public function innerJoin(string $table1, string $table2, string $value1, string $value2, ?WhereInterface $where): array;
}