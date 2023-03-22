<?php

namespace Ecommerce\Cart\Controller;

use Ecommerce\Cart\Model\CartRepository;
use Ecommerce\Core\Controller\ControllerInterface;

class Delete implements ControllerInterface
{
    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        if (isset($_POST['delete'])) {
            $cartRepository = new CartRepository();
            $cartRepository->delete();
            header("Location: /cart/view");
        }
    }
}