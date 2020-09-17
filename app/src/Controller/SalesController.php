<?php

declare(strict_types=1);

namespace Imob\Controller;

use Imob\Model\ModelSales;
use Imob\View\View;
use System\Common;

class SalesController
{
    public function __construct()
    {
        $this->model =  new ModelSales();
    }
    public function main()
    {
        $view = new View('sales/sales', true);
        $view->controller = 'sales';
        return $view->render();
    }

    public function getProductByCodeAndName()
    {
        $param = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $response = $this->model->getProductByCodeAndName($param);
        array_walk_recursive($response, function (&$item, $key) {
            $item = $key === 'dateExpiration' ? Common::convertDateDataBaseToBr($item) : $item;
        });
        echo json_encode($response);
    }

    public function finalizeSale()
    {
        echo '<pre>' . print_r($_POST, true) . '</pre>';
        exit();
    }
}
