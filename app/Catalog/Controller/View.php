<?php

declare(strict_types=1);

namespace Ecommerce\Catalog\Controller;

use Ecommerce\Catalog\View\Output;
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