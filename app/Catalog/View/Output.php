<?php

declare(strict_types=1);

namespace Ecommerce\Catalog\View;

use Ecommerce\Catalog\Model\DepartmentRepository;
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
        $departmets = new DepartmentRepository();
        $dataList = $departmets->getList();
        $dataId = $departmets->get((int) $_GET['id']);

        $loader = new FilesystemLoader('templates');
        $twig = new Environment($loader, ['cache' => 'templates_c']);
        $template = $twig->load('products.twig');
        echo $template->render(['dataList' => $dataList, 'dataId' => $dataId]);
    }
}