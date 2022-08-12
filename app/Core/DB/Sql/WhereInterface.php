<?php
declare(strict_types=1);

namespace Ecommerce\Core\DB\Sql;

interface WhereInterface
{
    /**
     * Return WHERE conditions
     *
     * @return string
     */
    public function getField(): string;

    /**
     * @return string|int|float
     */
    public function getValues(): string|int|float;

    /**
     * @return string
     */
    public function getConditions(): string;
}