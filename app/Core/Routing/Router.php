<?php

declare(strict_types=1);

namespace Ecommerce\Core\Routing;

use Ecommerce\Core\Controller\ControllerInterface;
use Ecommerce\Core\Controller\RetrieveControllerName;

class Router implements RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(): ControllerInterface|false
    {
        $controllerName = new RetrieveControllerName();
        $controllerName = $controllerName->retrieveControllerName();

        $className = sprintf(
            '\Ecommerce\%s\Controller\%s',
            $controllerName[0] ?? 'Index',
            $controllerName[1] ?? 'Index',
        );
        if (class_exists($className)) {
            $controller = new $className();
        } else {
            $controller = false;
        }
        return $controller;
    }
}
