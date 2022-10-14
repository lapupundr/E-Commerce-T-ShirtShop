<?php

declare(strict_types=1);

namespace Ecommerce\Catalog\Model;

interface ProductRepositoryInterface
{
    /**
     * Retrieve all products for the specific department.
     *
     * @param int $departmentId
     * @return string[][]
     */
    public function getList(int $departmentId): array;

    /**
     * Get Product information.
     *
     * @param int $productId
     * @return string[]
     */
    public function get(int $productId): array;
}