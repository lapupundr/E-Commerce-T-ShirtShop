<?php

namespace Ecommerce\Core\DB\Sql;

class Where implements WhereInterface
{
    /**
     * @var array
     */
    private array $arrWhere = ['field', 'condition', 'value'];

    /**
     * @param array $arrWhereValues
     */
    public function __construct(array $arrWhereValues)
    {
        $this->arrWhere = array_combine($this->arrWhere, $arrWhereValues);
        $this->getField();
    }

    /**
     * @inheritDoc
     */
    public function getField(): string
    {
        return $this->arrWhere['field'];
    }

    public function getConditions(): mixed
    {
        return $this->arrWhere['condition'];
    }

    public function getValues(): mixed
    {
        return $this->arrWhere['value'];
    }
}