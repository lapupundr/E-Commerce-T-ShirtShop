<?php

declare(strict_types=1);

namespace Ecommerce\Core\Routing;

use Ecommerce\Core\Controller\ControllerInterface;
use Ecommerce\Core\Controller\NoRoute;

class NotFoundRouter implements RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(): ControllerInterface|false
    {
        echo("404 ");
        return new NoRoute();
    }
}