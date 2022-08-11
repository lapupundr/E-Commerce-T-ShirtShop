<?php
declare(strict_types=1);

namespace Ecommerce\Core\DB\Sql;

interface InsertInterface
{
    /**
     * Insert record to database.
     *
     * @param string $tableName
     * @param string $colName
     * @param string $value
     * @return void
     */
    public function insert(string $tableName, array $arrValue): void;
}