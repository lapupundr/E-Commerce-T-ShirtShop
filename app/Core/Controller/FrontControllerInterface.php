<?php

declare(strict_types=1);

namespace Ecommerce\Core\Controller;

interface FrontControllerInterface
{
    /**
     * Defines main routing. Choose the right router of matching browser request URLs with our controllers.
     *
     * @return void
     */
    public function execute(): void;
}