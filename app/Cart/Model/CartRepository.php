<?php

declare(strict_types=1);

namespace Ecommerce\Cart\Model;

use Ecommerce\Core\DB\DBConnection;
use Ecommerce\Core\DB\Sql\Select;
use Ecommerce\Core\DB\Sql\Where;

class CartRepository implements CartRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function add(): void
    {
        $_SESSION['userId'] = $_COOKIE['PHPSESSID'];
        $_SESSION['productId'] = $_POST['productId'];
        $userId = $_SESSION['userId'];
        $productId = $_SESSION['productId'];
        $selectCartId = new Select();
        $where = new Where(['phpsessid', $userId, '=']);
        $result = $selectCartId->selectAll('shopping_cart', $where);

        $sql = <<<SQL
INSERT INTO shopping_cart (phpsessid) VALUES ('$userId');
SQL;

        $connection = DBConnection::getConnection();
        if (empty($result)) {
            $connection->query($sql);
            $result = $selectCartId->selectAll('shopping_cart', $where);

        } else {
            foreach ($result as $value) {
                if (!in_array($userId, $value)) {
                    $connection->query($sql);
                }
            }
        }
        $cartId = $result[0]['id'];
        $sqlAddToCart = <<<SQL
INSERT INTO shopping_cart_item (cart_id, product_id, qty) VALUES ($cartId, $productId, 1)
SQL;
        $connection->query($sqlAddToCart);

    }
}