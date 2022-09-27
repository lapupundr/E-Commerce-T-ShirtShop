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
    public function selectAll(string $table, ?WhereInterface $where): array;

    /**
     * Retrieve the first row from array
     *
     * @param array $arr
     * @return array
     */
    public function selectFirst(array $arr): array;

    /**
     * The same functionality as a classic select, but fetch the values only from specific column
     *
     * @param string $table
     * @param string $nameCol
     * @param WhereInterface|null $where
     * @return array
     */
    public function selectColumn(string $table, string $nameCol, ?WhereInterface $where = null): array;
}

