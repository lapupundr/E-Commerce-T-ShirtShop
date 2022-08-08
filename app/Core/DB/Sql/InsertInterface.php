<?php
declare(strict_types=1);

namespace Ecommerce\Core\DB\Sql;

interface InsertInterface
{
    /**
     * Insert record to database.
     *
     * @param string $col_name
     * @param string $value
     * @return void
     */
    public function insert(string $table_name, string $col_name, string $value): void;
}