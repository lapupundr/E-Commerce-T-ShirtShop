<?php

declare(strict_types=1);

namespace Ecommerce\Core\Routing;

use Ecommerce\Core\Controller\ControllerInterface;

class Router implements RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(): ControllerInterface|false
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
            $controller = false;
        }
        return $controller;
    }

    /**
     * Retrieve controller name from URL and put it into array
     *
     * @return string[]
     */
    private function retrieveControllerName(): array
    {
        $requestUri = $_SERVER['REQUEST_URI'];
        if (str_contains($requestUri, '?')) {
            $requestUri = strstr($requestUri, '?', true);
        }
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
