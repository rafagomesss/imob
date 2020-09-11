<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
try {
    $app = AppFactory::create();

    $app->post('/authenticate', 'Api\Controller\Auth:userLogin');
    $app->post('/register', 'Api\Controller\Auth:userRegister');

    $app->post('/product/register', 'Api\Controller\Product:productRegister');

    $app->run();
} catch (\Throwable $t) {
    echo json_encode(['error' => true, 'code' => $t->getCode(), 'message' => $t->getMessage(), 'line' => $t->getLine(), 'file' => $t->getFile()]);
} catch (\Exception $e) {
    echo json_encode(['error' => true, 'code' => $e->getCode(), 'message' => $e->getMessage(), 'line' => $e->getLine(), 'file' => $e->getFile()]);
}
