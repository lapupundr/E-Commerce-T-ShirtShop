<?php

declare(strict_types=1);

$a = 1;

session_start();

use Ecommerce\Core\Controller\FrontController;

require_once __DIR__ . '/vendor/autoload.php';

$router = new FrontController();
$router->execute();

$addToCart = new Ecommerce\Cart\Controller\Add();
$addToCart->execute();
