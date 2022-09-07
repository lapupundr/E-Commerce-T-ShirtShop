<?php
declare(strict_types=1);

namespace Ecommerce\Core\DB\Sql;

use Ecommerce\Core\DB\DBConnection;

class Insert implements InsertInterface
{
    /**
     * @inheritDoc
     */
    public function insert(string $tableName, array $arrValue): void
    {
        $keys = implode(', ', array_keys($arrValue));
        $values = implode(', ', $arrValue);
        $countItems = str_repeat('?', count($arrValue));
        $sql = "INSERT INTO $tableName ($keys) VALUES ($countItems)";
        $connection = DBConnection::getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->execute([$values]);
    }
}