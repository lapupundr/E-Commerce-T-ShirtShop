<?php

namespace Ecommerce\Core\Routing;

use Ecommerce\Core\Controller\ControllerInterface;
use Ecommerce\Core\DB\Sql\Select;

class UrlRewriteRouter implements RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(): ControllerInterface|false
    {
        echo (' UrlRewriteRouter ');
        $urlName = $_SERVER['REQUEST_URI'];
        $controllerList = new Select();
        $controllerList = $controllerList->selectAll('url_rewrite');
        if (in_array($urlName, $controllerList)) {
        }

        return false;
    }
}