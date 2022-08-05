<?php

declare(strict_types=1);

namespace Ecommerce\Core\Controller;

class NoRoute implements ControllerInterface
{
    /**
     * Return the message when the page doesn't exist
     *
     * @return void
     */
    public function execute(): void
    {
        echo 'Page Not Found!';
    }
}
