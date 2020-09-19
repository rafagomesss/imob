<?php

declare(strict_types=1);

namespace Imob\Controller;

use Imob\Model\ModelCustomer;
use Imob\View\View;

class CustomersController
{
    private $model;

    public function __construct()
    {
        $this->model = new ModelCustomer();
    }

    public function list()
    {
        $view = new View('customers/list', true);
        $view->controller = 'customers';
        $view->action = 'list';
        $view->customers = $this->model->getAll();
        return $view->render();
    }

    public function register()
    {
        $view = new View('customers/register', true);
        $view->controller = 'customers';
        $view->action = 'register';
        $view->customer = [];
        return $view->render();
    }
}
