<?php

declare(strict_types=1);

namespace Imob\Controller;

use Imob\Model\ModelProduct;
use Imob\View\View;
use System\Common;
use System\Flash;
use System\RequestAPI;

class ProductsController
{
    private $model;
    public function __construct()
    {
        $this->model = new ModelProduct();
    }
    public function list()
    {
        $view = new View('products/list', true);
        $view->controller = 'products';
        $view->action = 'list';
        $view->products = $this->model->getAll();
        return $view->render();
    }

    public function edit(array $data)
    {
        $view = new View('products/register', true);
        $view->controller = 'products';
        $view->action = 'edit';
        $view->product = $this->model->editProduct(['id' => $data[0]]);
        if (!empty($view->product['error'])) {
            Flash::set('danger', $view->product['message']);
            header('Location: /products/list');
            exit();
        }
        return $view->render();
    }

    public function register()
    {
        $view = new View('products/register', true);
        $view->controller = 'products';
        $view->action = 'register';
        $view->product = [];
        return $view->render();
    }

    public function delete()
    {
        $id = filter_input(INPUT_POST, 'productId', FILTER_VALIDATE_INT) ?? null;
        if (empty($id) || !is_numeric($id)) {
            echo json_encode(['error' => true, 'message' => 'Identificação do produto não encontrada!']);
            exit();
        }
        echo json_encode($this->model->deleteProduct(['id' => $id]));
    }

    public function registerProduct()
    {
        $formData = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $formData['productExpiration'] = Common::convertDateToDataBase($formData['productExpiration']);
        echo json_encode($this->model->registerProduct($formData));
    }

    public function updateProduct()
    {
        $formData = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $formData['idProduct'] = Common::encryptDecryptData($formData['idProduct'], true);
        $formData['productExpiration'] = Common::convertDateToDataBase($formData['productExpiration']);

        echo json_encode($this->model->updateProduct($formData));
    }
}
