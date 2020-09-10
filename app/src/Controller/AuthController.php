<?php

declare(strict_types=1);

namespace Imob\Controller;

use Imob\View\View;
use System\Flash;
use System\PasswordManager;
use System\RequestAPI;
use System\Session;

class AuthController extends Controller
{
    public function __construct()
    {
    }

    private function validarDadosPost(): array
    {
        $formData = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $formData['password'] = PasswordManager::passwordHash($formData['password']);
        unset($formData['confirmPassword']);
        return $formData;
    }

    private function setSessionUser(array $userData)
    {
        Session::sessionStart();
        Session::set('USER', $userData['login']);
        Session::set('ACCESS_LEVEL', $userData['access_level_id']);
        Flash::set('success', 'Usuário logado com sucesso!');
    }

    public function authenticate(): void
    {
        $userData = filter_input_array(INPUT_POST);
        $retorno = (new RequestAPI)->sendRequest(URL_API . '/authenticate', $userData);
        if (empty($retorno['error']) && !empty($retorno['user'])) {
            $verify = PasswordManager::validatePassword($userData['pass'], $retorno['user']['password']);
            if ($verify) {
                $this->setSessionUser($retorno['user']);
                echo json_encode($retorno);
                exit();
            }
        }
        $retorno = ['error' => true, 'message' => 'Usuário e/ou senha inválido(s)!'];
        echo json_encode($retorno);
    }

    public function register()
    {
        $view = new View('authentication/register');
        $view->controller = 'auth';
        return $view->render();
    }

    public function registerUser(): void
    {
        $userData = $this->validarDadosPost();
        $retorno = (new RequestAPI)->sendRequest(URL_API . '/register', $userData);
        echo json_encode($retorno);
    }

    public function logout()
    {
        Session::destroySession();
        Session::sessionStart();
        Flash::set('info', 'Usuário deslogado!');
        header('Location: /');
    }
}
