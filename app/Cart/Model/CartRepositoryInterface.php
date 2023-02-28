<?php

declare(strict_types=1);

namespace Ecommerce\Cart\Model;

interface CartRepositoryInterface
{
    /**
     * Create in DB (shopping_cart) new cart if it is not exists. Add products in the cart to DB (shopping_cart_item).
     *
     * @return void
     */
    public function add(): void;

    /**
     * Delete items from cart and DB (shopping_cart).
     *
     * @return void
     */
    public function delete(): void;

}