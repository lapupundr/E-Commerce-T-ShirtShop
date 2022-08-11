<?php
declare(strict_types=1);

namespace Ecommerce\Core\DB\Sql;

interface WhereInterface
{
    /**
     * Return WHERE conditions
     *
     * @return mixed
     */
    public function getField(): string;

    public function getConditions(): mixed;

    public function getValues(): mixed;
}