<?php

declare(strict_types=1);

namespace Ecommerce\Core\Routing;

use Ecommerce\Core\Controller\ControllerInterface;

/**
 * Defines an approach of matching browser request URLs with our controllers.
 */
interface RouterInterface
{
    /**
     * Here we identify which controllers to use.
     * If some controller will be found we return object ControllerInterface
     * else return false
     *
     * @return ControllerInterface|false
     */
    public function match(): ControllerInterface|false;
}