<?php

namespace Ecommerce\Catalog\Controller;

use Ecommerce\Core\Controller\ControllerInterface;

class Cart implements ControllerInterface
{
    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        echo " We are inside Shopping cart. Hi";
    }
}