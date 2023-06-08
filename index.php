<?php

declare(strict_types=1);

session_start();

use Ecommerce\Core\Controller\FrontController;

require_once __DIR__ . '/vendor/autoload.php';

$router = new FrontController();
$router->execute();
