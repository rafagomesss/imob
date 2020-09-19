<?php

declare(strict_types=1);

namespace Imob\Controller;

use Imob\Model\ModelCustomer;
use Imob\View\View;
use System\Common;
use System\Flash;

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
        $view->states = $this->listStates();
        return $view->render();
    }

    public function edit(array $data)
    {
        $view = new View('customers/register', true);
        $view->controller = 'customers';
        $view->action = 'edit';
        $view->customer = $this->model->editCustomer(['id' => $data[0]]);
        $view->states = $this->listStates();
        if (!empty($view->customer['error'])) {
            Flash::set('danger', $view->customer['message']);
            header('Location: /customers/list');
            exit();
        }
        return $view->render();
    }

    public function delete()
    {
        $id = filter_input(INPUT_POST, 'customerId', FILTER_VALIDATE_INT) ?? null;
        if (empty($id) || !is_numeric($id)) {
            echo json_encode(['error' => true, 'message' => 'Identificação do cliente não encontrada!']);
            exit();
        }
        echo json_encode($this->model->deleteCustomer(['id' => $id]));
    }

    public function registerCustomer()
    {
        $formData = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $formData['customerDateBirth'] = Common::convertDateToDataBase($formData['customerDateBirth']);
        echo json_encode($this->model->registerCustomer($formData));
    }

    public function zipConsult(): void
    {
        $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_NUMBER_INT);
        echo json_encode(Common::consultZip($cep));
    }

    public function listStates()
    {
        return Common::listStates();
    }
}
