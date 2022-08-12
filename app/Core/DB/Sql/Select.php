<?php

namespace Ecommerce\Core\DB\Sql;

use Ecommerce\Core\DB\ConnectionInterface;

class Select implements SelectInterface
{
    /**
     * @var ConnectionInterface
     */
    private ConnectionInterface $connection;

    /**
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @inheritDoc
     */
    public function select(string $table, ?WhereInterface $where): array
    {
        $sql = "SELECT * FROM $table";
        $this->addWhereCondition($where, $sql);
        $connection = $this->connection->getConnection();
        $result = $connection->query($sql);
        $listOfSetupModules = $result->fetch_assoc();
        return $listOfSetupModules ?: [];
//        return ($listOfSetupModules) ? ($listOfSetupModules) : ([]);
    }

    /**
     * @param WhereInterface|null $where
     * @param string $sql
     * @return void
     */
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