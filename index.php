<?php

declare(strict_types=1);

use Ecommerce\Core\Controller\FrontController;
use Ecommerce\Core\Routing\Router;

require_once __DIR__ . '/vendor/autoload.php';

//$router = new Router();
//$router->match();

$router = new FrontController();
$router->execute();
