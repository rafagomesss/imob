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
                'SELECT * FROM user_access WHERE login = :login AND
            password = :password'
            );
            $stmt->bindValue(':login', $login);
            $stmt->bindValue(':password', $senha);
            $stmt->execute();
            $retorno = ['error' => true, 'message' => 'Usuário e/ou senha inválido(s)!'];
            if ($stmt->rowCount() > 0) {
                $retorno = ['message' => 'Usuário encontrado!'];
            }
        } catch (\PDOException $pEx) {
            $retorno = ['error' => true, 'code' => $pEx->getCode(), 'message' => $pEx->getMessage(), 'line' => $pEx->getLine(), 'file' => $pEx->getFile()];
        }
        $response->getBody()->write(json_encode($retorno));
        return $response;
    }
}
