<?php

declare(strict_types=1);

namespace Ecommerce\Core\Controller;

use Ecommerce\Core\Routing\NotFoundRouter;
use Ecommerce\Core\Routing\Router;

class FrontController implements FrontControllerInterface
{

    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        $controllerArray = [new Router(), new NotFoundRouter()];
        foreach ($controllerArray as $value) {
            $controller = $value->match();
            if ($controller) {
                $controller->execute();
            }
        }
    }
}