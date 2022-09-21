<?php

declare(strict_types=1);

namespace Ecommerce\Core\Routing;

use Ecommerce\Core\Controller\ControllerInterface;

class Router implements RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(array $controllerName): ControllerInterface|false
    {

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
