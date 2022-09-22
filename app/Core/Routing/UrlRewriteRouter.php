<?php

namespace Ecommerce\Core\Routing;

use Ecommerce\Core\Controller\ControllerInterface;

class UrlRewriteRouter implements RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(): ControllerInterface|false
    {
        return false;
    }
}