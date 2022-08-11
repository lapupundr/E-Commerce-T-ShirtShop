<?php

namespace Ecommerce\Core\DB\Sql;

use Ecommerce\Core\DB\ConnectionInterface;
use Ecommerce\Core\DB\Sql\WhereInterface;

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
        $field = $where->getField();
        $condition = $where->getConditions();
        $value = $where->getValues();
        if ($where) {
            $sql .= " WHERE $field $condition '$value'";
        }
        $connection = $this->connection->getConnection();
        $result = $connection->query($sql);
        $listOfSetupModules = $result->fetch_assoc();
        $listResult = ($listOfSetupModules) ? ($listOfSetupModules) : ([]);
        return $listResult;
    }
}