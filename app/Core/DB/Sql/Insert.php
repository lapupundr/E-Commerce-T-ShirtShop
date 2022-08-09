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
    public function insert(string $table_name, string $col_name, string $value): void
    {
        $sql = <<<SQL
INSERT INTO $table_name ($col_name) VALUES('$value');
SQL;
        $connection = $this->connection->getConnection();
        $connection->query($sql);
    }
}