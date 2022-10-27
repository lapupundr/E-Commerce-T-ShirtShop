<?php

declare(strict_types=1);

namespace Ecommerce\Cart\Setup;

use Ecommerce\Core\DB\DBConnection;
use Ecommerce\Core\Install\InstallInterface;

class CreateShoppingCartItemTable implements InstallInterface
{
    /**
     * @inheritDoc
     */
    public function install(): void
    {
        $sql = <<<SQL
CREATE TABLE shopping_cart_item (
    id INT AUTO_INCREMENT,
    cart_id INT NOT NULL,
    product_id INT NOT NULL,
    qty INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (cart_id) REFERENCES shopping_cart(id),
    CONSTRAINT shopping_item UNIQUE (id, cart_id, product_id)
)
SQL;
        $connection = DBConnection::getConnection();
        $connection->query('DROP TABLE IF EXISTS shopping_cart_item');
        $connection->query($sql);
    }
}