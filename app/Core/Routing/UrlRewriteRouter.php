<?php

namespace Ecommerce\Core\Routing;

use Ecommerce\Core\Controller\ControllerInterface;
use Ecommerce\Core\DB\Sql\Select;
use Ecommerce\Core\DB\Sql\Where;

class UrlRewriteRouter implements RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(): ControllerInterface|false
    {
        echo (' UrlRewriteRouter ');
        $urlName = $_SERVER['REQUEST_URI'];
        $urlName = ltrim($urlName, "/");
        $controllerList = new Select();
        $where = new Where(['request_url', $urlName, '=']);
        $controllerList = $controllerList->selectAll('url_rewrite', $where);

        $result = $controllerList[0]['controller_name'];

        return new $result;
    }
}