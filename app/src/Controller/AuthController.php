<?php

declare(strict_types=1);

namespace Imob\Controller;

use Imob\View\View;
use System\RequestAPI;

class AuthController extends Controller
{
    public function __construct()
    {
    }

    public function authenticate()
    {
        $userData = filter_input_array(INPUT_POST);
        $retorno = (new RequestAPI)->sendRequest(URL_API . '/authenticate', $userData);
        echo json_encode($retorno);
    }
}
