<?php

declare(strict_types=1);

namespace Ecommerce\Cart\Controller;

use Ecommerce\Cart\Model\CartRepository;
use Ecommerce\Core\Controller\ControllerInterface;

class Add implements ControllerInterface
{
    /**
     * If product add to cart execute class CartRepository()
     *
     * @return void
     */
    public function execute(): void
    {
        if (isset($_POST['addToCart'])) {
            $cartRepository = new CartRepository();
            $cartRepository->add();
        }
    }
}