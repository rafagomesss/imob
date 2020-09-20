<?php

use Api\Exception\ApiException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
try {
    $app = AppFactory::create();

    $app->post('/authenticate', 'Api\Controller\Auth:userLogin');
    $app->post('/register', 'Api\Controller\Auth:userRegister');

    $app->post('/product/register', 'Api\Controller\Product:productRegister');
    $app->get('/product/listAll', 'Api\Controller\Product:productGetAll');
    $app->post('/product/delete', 'Api\Controller\Product:delete');
    $app->post('/product/edit', 'Api\Controller\Product:getProduct');
    $app->post('/product/update', 'Api\Controller\Product:update');
    $app->post('/product/getProductByNameCode', 'Api\Controller\Product:getByCodeName');

    $app->post('/customer/register', 'Api\Controller\Customer:customerRegister');
    $app->get('/customer/customers', 'Api\Controller\Customer:getAllCustomers');
    $app->post('/customer/delete', 'Api\Controller\Customer:delete');
    $app->post('/customer/update', 'Api\Controller\Customer:update');
    $app->post('/customer/edit', 'Api\Controller\Customer:getCustomer');

    $app->run();
} catch (\Throwable $t) {
    ApiException::printException($t);
} catch (\Exception $e) {
    ApiException::printException($e);
}
