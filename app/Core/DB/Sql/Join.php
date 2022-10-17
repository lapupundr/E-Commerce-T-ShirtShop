<?php

declare(strict_types=1);

namespace Ecommerce\Core\DB\Sql;

use Ecommerce\Core\DB\DBConnection;

class Join implements JoinInterface
{
    public function innerJoin(string $table1, string $table2, string $value1, string $value2, ?WhereInterface $where = null): array
    {
        $sql = <<<SQL
SELECT * FROM $table1
JOIN $table2 ON $value1 = $value2
SQL;
        $connection = DBConnection::getConnection();
        $this->addWhereCondition($where, $sql);
        $result = $connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    private function addWhereCondition(?WhereInterface $where, string &$sql): void
    {
        if ($where instanceof WhereInterface) {
            $field = $where->getField();
            $condition = $where->getConditions();
            $value = $where->getValues();
            $sql .= " WHERE $field $condition '$value'";
        }
    }
}