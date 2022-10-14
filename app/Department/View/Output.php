<?php

declare(strict_types=1);

namespace Ecommerce\Department\View;

use Ecommerce\Department\Model\DepartmentRepository;
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
        $departments = new DepartmentRepository();
        $dataList = $departments->getList();
        if ($_GET) {
            $dataId = $departments->get((int)$_GET['id']);
        } else {
            $dataId = [];
        }
        $loader = new FilesystemLoader('templates');
        $twig = new Environment(
            $loader,
//            ['cache' => 'templates_c'],
        );
        $template = $twig->load('products.twig');
        echo $template->render(['dataList' => $dataList, 'dataId' => $dataId]);
    }
}