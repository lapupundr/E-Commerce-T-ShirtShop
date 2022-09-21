<?php

declare(strict_types=1);

namespace Ecommerce\Core\Controller;


use Ecommerce\Core\Routing\NotFoundRouter;
use Ecommerce\Core\Routing\Router;

class FrontController implements ControllerInterface
{

    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        $controllerName = $this->retrieveControllerName();
        $controllerArray = [new Router(), new NotFoundRouter()];
        foreach ($controllerArray as $value) {
            $controller = $value->match($controllerName);
            if ($controller) {
                $controller->execute();
            }
        }

    }

    /**
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