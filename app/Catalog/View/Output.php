<?php

declare(strict_types=1);

namespace Ecommerce\Catalog\View;

use Ecommerce\Catalog\Model\GetDepartments;
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
        $departments = new GetDepartments();
        $data = $departments->getDepartments();

        $loader = new FilesystemLoader('templates');
        $twig = new Environment($loader);
        $template = $twig->load('products.twig');
        echo $template->render($data);
    }
}