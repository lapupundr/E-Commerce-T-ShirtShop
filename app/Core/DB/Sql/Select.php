<?php

namespace Ecommerce\Core\DB\Sql;

use Ecommerce\Core\DB\DBConnection;

class Select implements SelectInterface
{
    /**
     * @inheritDoc
     */
    public function select(string $table, ?WhereInterface $where = null): array
    {
        $sql = "SELECT * FROM $table";
        $this->addWhereCondition($where, $sql);
        $connection = DBConnection::getConnection();
        $result = $connection->query($sql);
        return $result->fetch_all();
//        $listOfSetupModulesOneArr = [];
//        foreach ($listOfSetupModules as $value) {
//            $listOfSetupModulesOneArr = array_merge($listOfSetupModulesOneArr, $value);
//        }
//        return $listOfSetupModulesOneArr ?: [];
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