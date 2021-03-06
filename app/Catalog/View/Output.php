<?php

namespace Ecommerce\Catalog\View;

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
        $loader = new FilesystemLoader('templates');
        $twig = new Environment($loader);
        $twig->display('products.twig');
    }
}