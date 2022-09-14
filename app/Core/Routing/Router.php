<?php

declare(strict_types=1);

namespace Ecommerce\Core\Routing;

use Ecommerce\Core\Controller\NoRoute;

class Router implements RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(): void
    {
        $controllerName = $this->retrieveControllerName();
        $className = sprintf(
            '\Ecommerce\%s\Controller\%s',
            $controllerName[0] ?? 'Index',
            $controllerName[1] ?? 'Index',
        );
        if (class_exists($className)) {
            $controller = new $className();
        } else {
            $controller = new NoRoute();
        }
        $controller->execute();
    }

    /**
     * @return string[]
     */
    private function retrieveControllerName(): array
    {
        $requestUri = $_SERVER['REQUEST_URI'];
        $requestUri = strstr($requestUri, '?', true);
        $requestArray = explode('/', $requestUri);
        $urlKeys = [];
        foreach ($requestArray as $element) {
            if ($element) {
                $element = substr($element, 0, strcspn($element, '.'));
                $urlKeys[] = ucfirst($element);
            }
        }
        return $urlKeys;
    }
}
