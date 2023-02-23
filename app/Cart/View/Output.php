<?php

declare(strict_types=1);

namespace Ecommerce\Cart\View;

use Ecommerce\Cart\Model\CartList;
use Ecommerce\Core\Controller\ControllerInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Output implements ControllerInterface
{
    /**
     * Execute the Cart template
     */
    public function execute(): void
    {
        $list = new CartList();
        $cartId = $list->getCartId();
        $productList = $list->getList($cartId);
        $loader = new FilesystemLoader('templates');
        $twig = new Environment($loader);
        $template = $twig->load('cart.twig');
        echo $template->render(['productList' => $productList]);
    }
}