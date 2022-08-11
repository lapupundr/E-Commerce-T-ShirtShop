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
    public function select(string $table, array $where = [], string $condition = 'LIKE', string $pattern = '%'): array
    {
        $sql = <<<SQL
SELECT * FROM $table;
SQL;
        $connection = $this->connection->getConnection();
        $result = $connection->query($sql);
        $listOfSetupModules = $result->fetch_assoc();
        $listResult = ($listOfSetupModules) ? ($listOfSetupModules) : ([]);
        return $listResult;
    }
}