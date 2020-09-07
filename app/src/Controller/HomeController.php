<?php

declare(strict_types=1);

namespace Imob\Controller;

use Imob\View\View;

class HomeController
{
    public function main()
    {
        print (new View('teste'))->render();
    }
}
