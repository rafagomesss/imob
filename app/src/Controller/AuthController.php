<?php

declare(strict_types=1);

namespace Imob\Controller;

use Exception;
use Imob\View\View;
use System\Flash;
use System\PasswordManager;
use System\RequestAPI;
use System\Session;

class AuthController
{
    public function __construct()
    {
    }

    private function verifyDataIsEmpty($data, bool $ajax = false): void
    {
        if (is_array($data) && count($data)) {
            foreach ($data as $item) {
                if (empty($item)) {
                    echo json_encode([
                        'error' => true,
                        'message' => 'Preencha todos os campos para registrar usuário!',
                        'class' => 'warning'
                    ]);
                    exit();
                }
            }
        }
    }

    private function dataPostValidate(): array
    {
        $formData = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $this->verifyDataIsEmpty($formData, true);
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

    public function login()
    {
        $view = new View('authentication/login', true);
        $view->controller = 'auth';
        $view->action = 'login';
        return $view->render();
    }

    public function authenticate(): void
    {
        $userData = filter_input_array(INPUT_POST);
        $retorno = RequestAPI::sendRequest(URL_API . '/authenticate', $userData);
        if (empty($retorno['error']) && !empty($retorno['user'])) {
            $verify = PasswordManager::validatePassword($userData['pass'], $retorno['user']['password']);
            if ($verify) {
                $this->setSessionUser($retorno['user']);
                echo json_encode($retorno);
                exit();
            }
            $retorno = ['error' => true, 'message' => 'Usuário e/ou senha inválido(s)!'];
        }
        echo json_encode($retorno);
        exit();
    }

    public function register()
    {
        $view = new View('authentication/register', true);
        $view->controller = 'auth';
        $view->action = 'register';
        return $view->render();
    }

    public function registerUser(): void
    {
        $userData = $this->dataPostValidate();
        $retorno = RequestAPI::sendRequest(URL_API . '/register', $userData);
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
