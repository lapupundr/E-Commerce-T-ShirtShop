<?php

namespace Ecommerce\Catalog\View;

use Ecommerce\Core\Controller\ControllerInterface;
use Ecommerce\Core\DB\DBConnection;
use Ecommerce\Core\DB\Sql\GetDepartments;
use Ecommerce\Core\DB\Sql\Select;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Output implements ControllerInterface
{
    /**
     * Execute the Catalog template
     */
    public function execute(): void
    {
//        $select = new Select($connection);
        $departments = new GetDepartments();
        $data = $departments->getDepartments();

        $loader = new FilesystemLoader('templates');
        $twig = new Environment($loader);
        $twig->display('products.twig');

    }
}