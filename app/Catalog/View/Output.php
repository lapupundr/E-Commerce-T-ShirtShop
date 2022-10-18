<?php

declare(strict_types=1);

namespace Ecommerce\Catalog\View;

use Ecommerce\Catalog\Model\ProductRepository;
use Ecommerce\Core\Controller\ControllerInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Output implements ControllerInterface
{
    /**
     * Execute the Catalog template
     */
    public function execute(): void
    {
        $product = new ProductRepository();
//        $productList = $product->getList(1);
        $productId = $product->get(1);

        $loader = new FilesystemLoader('templates');
        $twig = new Environment(
            $loader,
//            ['cache' => 'templates_c'],
        );
//        $template = $twig->load('catalog/productList.twig');
        $template = $twig->load('mainProduct.twig');
        echo $template->render(['product' => $productId]);
    }
}