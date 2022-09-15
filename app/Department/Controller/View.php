<?php

declare(strict_types=1);

namespace Ecommerce\Department\Controller;

use Ecommerce\Department\View\Output;
use Ecommerce\Core\Controller\ControllerInterface;

class View implements ControllerInterface
{
    /**
     * Loading the Catalog template
     */
    public function execute(): void
    {
        $view = new Output();
        $view->execute();
    }
}