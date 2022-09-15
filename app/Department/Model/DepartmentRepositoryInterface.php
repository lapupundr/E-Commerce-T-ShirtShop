<?php

declare(strict_types=1);

namespace Ecommerce\Catalog\Model;

interface DepartmentRepositoryInterface
{
    /**
     * Get all Department.
     *
     * @return string[][]
     */
    public function getList(): array;

    /**
     * Get one Department.
     *
     * @param int $departmentId
     * @return string[]
     */
    public function get(int $departmentId): array;
}