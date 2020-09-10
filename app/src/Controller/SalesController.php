<?php

declare(strict_types=1);

namespace Imob\Controller;

use Imob\View\View;

class SalesController
{
    public function main()
    {
        $view = new View('sales/sales', true);
        $view->controller = 'sales';
        return $view->render();
    }
}
