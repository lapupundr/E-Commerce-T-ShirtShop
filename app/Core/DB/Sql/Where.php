<?php

namespace Ecommerce\Core\DB\Sql;

use Ecommerce\Core\DB\WhereConditionException;

class Where implements WhereInterface
{
    /**
     * @var array
     */
    private array $arrWhere = [];

    /**
     * @var array
     */
    private array $arrWhereKeys = ['field', 'value', 'condition'];

    /**
     * @param array $arrWhereValues
     * @throws WhereConditionException
     */
    public function __construct(array $arrWhereValues)
    {
        $arrWhereValues[2] = strtoupper($arrWhereValues[2]);
        $this->arrWhere = array_combine($this->arrWhereKeys, $arrWhereValues);
        $available = ['>', '<', '=', 'LIKE'];
        $valueToCompare = $this->arrWhere['condition'];
        if (!in_array($valueToCompare, $available)) {
            throw new WhereConditionException('Unexpected condition: ' . $valueToCompare);
        }
    }

    /**
     * @inheritDoc
     */
    public function getField(): string
    {
        return $this->arrWhere['field'];
    }

    /**
     * @return string|int|float
     */
    public function getValues(): string|int|float
    {
        return $this->arrWhere['value'];
    }

    /**
     * @return string
     */
    public function getConditions(): string
    {
        return $this->arrWhere['condition'];
    }
}