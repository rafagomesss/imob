<?php

declare(strict_types=1);

namespace Imob\Controller;

use Imob\View\View;
use System\Common;
use System\Session;

class HomeController
{
    public function main()
    {
        $view = new View('authentication/login', true);
        $view->controller = 'home';
        return $view->render();
    }
}
