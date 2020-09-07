<?php

declare(strict_types=1);

namespace Imob\Controller;

use Imob\View\View;

class HomeController
{
    public function main()
    {
        $view = new View('authentication/login');
        return $view->render();
    }
}
