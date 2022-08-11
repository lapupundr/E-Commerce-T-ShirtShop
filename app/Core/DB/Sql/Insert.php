<?php
declare(strict_types=1);

namespace Ecommerce\Core\DB\Sql;

use Ecommerce\Core\DB\ConnectionInterface;

class Insert implements InsertInterface
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
    public function insert(string $tableName, array $arrValue): void
    {
        $keys = implode(', ', array_keys($arrValue));
        $values = implode(', ', $arrValue);
        $countItems = str_repeat('?', count($arrValue));
        $sql = "INSERT INTO $tableName ($keys) VALUES ($countItems)";
        $connection = $this->connection->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->execute([$values]);
    }
}