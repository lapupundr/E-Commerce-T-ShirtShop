<?php

declare(strict_types=1);

namespace Ecommerce\Cart\Model;

use Ecommerce\Core\DB\Sql\Join;
use Ecommerce\Core\DB\Sql\Select;
use Ecommerce\Core\DB\Sql\Where;

class CartList implements CartListInterface
{
    /**
     * @inheritDoc
     */
    public function getList(int $cartId): array
    {
        $join = new Join();
        $where = new Where(['cart_id', $cartId, '=']);
        $result = $join->innerJoin(
            'shopping_cart_item',
            'product',
            'shopping_cart_item.product_id',
            'product.product_id',
            $where
        );
        return $result;
    }

    public function getCartId(): int
    {
        $select = new Select();
        $where = new Where(['phpsessid', $_COOKIE['PHPSESSID'], '=']);
        $cardIdArray = $select->selectAll('shopping_cart', $where);
        return (int)$cardIdArray[0]['id'];

    }
}