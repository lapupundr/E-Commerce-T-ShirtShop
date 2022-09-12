<?php

declare(strict_types=1);

namespace Ecommerce\Core\Routing;

/**
 * Defines an approach of matching browser request URLs with our controllers.
 */
interface RouterInterface
{
    /**
     * Here we identify which controllers to use. And execute its action method.
     * We are expecting that some controller will be found here and after that
     * we run here its execute() method.
     *
     * @return void
     */
    public function match(): void;
}