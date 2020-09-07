<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
try {
    $app = AppFactory::create();

    $app->post('/authenticate', 'Api\Controller\Auth:userLogin');


    $app->run();
} catch (\Throwable $t) {
    echo json_encode(['code' => $t->getCode(), 'message' => $t->getMessage()]);
} catch (\Exception $e) {
    echo json_encode(['code' => $e->getCode(), 'message' => $e->getMessage()]);
}
