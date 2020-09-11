<?php

declare(strict_types=1);

namespace Imob\Controller;

use Imob\View\View;

class ProductsController
{
    public function list()
    {
        $view = new View('products/list', true);
        $this->controller = 'products';
        $this->method = 'list';
        $this->products = [];
        return $view->render();
    }

    public function register()
    {
        $view = new View('products/register', true);
        $this->controller = 'products';
        $this->method = 'register';
        $this->product = [];
        return $view->render();
    }
}
