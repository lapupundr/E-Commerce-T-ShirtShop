<?php

declare(strict_types=1);

namespace Ecommerce\Catalog\Controller;

use Ecommerce\Catalog\View\Output;
use Ecommerce\Core\Controller\ControllerInterface;

class View implements ControllerInterface
{
    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        $view = new Output();
        $view->execute();
    }
}