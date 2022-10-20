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
        $urlName = $_SERVER['REQUEST_URI'];
        $info = pathinfo($urlName);
        $urlName = strtolower($info['filename']);
        $controllerList = new Select();
        $where = new Where(['request_url', $urlName, '=']);
        $controllerList = $controllerList->selectAll('url_rewrite', $where);
        if (isset($controllerList[0])) {
            $json = $controllerList[0]['properties'];
            $json = json_decode($json, true);
            $_GET = $json;
            $result = $controllerList[0]['controller_name'];
            $result = str_replace('/', '\\', $result);
            return new $result();
        } else {
            return false;
        }
    }
}