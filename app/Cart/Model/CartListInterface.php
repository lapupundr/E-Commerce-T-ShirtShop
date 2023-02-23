<?php

declare(strict_types=1);

namespace Ecommerce\Cart\Model;

interface CartListInterface
{
    /**
     * Gets a list of items added to the cart from DB (shopping_cart_item).
     *
     * @param int $cartId
     * @return array
     */
    public function getList(int $cartId): array;

    /**
     * Get the Id of current cart.
     *
     * @return int
     */
    public function getCartId(): int;
}