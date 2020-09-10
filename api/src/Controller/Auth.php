<?php

declare(strict_types=1);

namespace Api\Controller;

use Api\DB\Connection;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Auth
{
    public function userLogin(Request $request, Response $response, $args)
    {
        try {
            $conn = Connection::getInstance();
            $login = $request->getParsedBody()['login'];
            $senha = $request->getParsedBody()['pass'];
            $stmt = $conn->prepare(
                'SELECT * FROM user_access WHERE login = :login'
            );
            $stmt->bindValue(':login', $login);
            $stmt->execute();
            $retorno = ['error' => true, 'message' => 'Usuário e/ou senha inválido(s)!'];
            if ($stmt->rowCount() > 0) {
                $retorno = ['user' => $stmt->fetch()];
            }
        } catch (\PDOException $pEx) {
            $retorno = ['error' => true, 'code' => $pEx->getCode(), 'message' => $pEx->getMessage(), 'line' => $pEx->getLine(), 'file' => $pEx->getFile()];
        }
        $response->getBody()->write(json_encode($retorno));
        return $response;
    }

    public function userRegister(Request $request, Response $response, $args)
    {
        try {
            $conn = Connection::getInstance();
            $login = $request->getParsedBody()['login'];
            $password = $request->getParsedBody()['password'];
            $stmt = $conn->prepare(
                'INSERT INTO user_access
                    SET login = :login,
                        password = :password,
                        access_level_id = :access_level_id'
            );
            $stmt->bindValue(':login', $login, \PDO::PARAM_STR);
            $stmt->bindValue(':password', $password, \PDO::PARAM_STR);
            $stmt->bindValue(':access_level_id', 1, \PDO::PARAM_INT);
            $stmt->execute();
            $retorno = ['error' => true, 'message' => 'Erro ao inserir usuário!'];
            if ($stmt->rowCount() > 0) {
                $retorno = ['message' => 'Usuário cadastrado com sucesso!'];
            }
        } catch (\PDOException $pEx) {
            $retorno = ['error' => true, 'code' => $pEx->getCode(), 'message' => $pEx->getMessage(), 'line' => $pEx->getLine(), 'file' => $pEx->getFile()];
        }
        $response->getBody()->write(json_encode($retorno));
        return $response;
    }
}
