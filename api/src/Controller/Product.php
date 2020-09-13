<?php

declare(strict_types=1);

namespace Api\Controller;

use Api\DB\Connection;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Product
{
    public function productRegister(Request $request, Response $response, $args)
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

    public function productGetAll(Request $request, Response $response, $args)
    {
        try {
            $conn = Connection::getInstance();
            $stmt = $conn->query('SELECT * FROM products');
            $retorno = ['error' => true, 'message' => 'Nenhum produto encontrado!'];
            if ($stmt->rowCount() > 0) {
                $retorno = $stmt->fetchAll();
            }
        } catch (\PDOException $pEx) {
            $retorno = ['error' => true, 'code' => $pEx->getCode(), 'message' => $pEx->getMessage(), 'line' => $pEx->getLine(), 'file' => $pEx->getFile()];
        }
        $response->getBody()->write(json_encode($retorno));
        return $response;
    }

    public function delete(Request $request, Response $response, $args)
    {
        try {
            $conn = Connection::getInstance();
            $id = $request->getParsedBody()['id'];
            $stmt = $conn->prepare('DELETE FROM products WHERE id = :id');
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            $retorno = ['error' => true, 'message' => 'Produto não existe!'];
            if ($stmt->rowCount() > 0) {
                $retorno = ['message' => 'Produto excluído com sucesso!'];
            }
        } catch (\PDOException $pEx) {
            $retorno = ['error' => true, 'code' => $pEx->getCode(), 'message' => $pEx->getMessage(), 'line' => $pEx->getLine(), 'file' => $pEx->getFile()];
        }
        $response->getBody()->write(json_encode($retorno));
        return $response;
    }

    public function edit(Request $request, Response $response, $args)
    {
        try {
            $conn = Connection::getInstance();
            $id = $request->getParsedBody()['id'];
            $stmt = $conn->prepare('SELECT * FROM products WHERE id = :id');
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            $retorno = ['error' => true, 'message' => 'Produto não encontrado!'];
            if ($stmt->rowCount() > 0) {
                $retorno = $stmt->fetch();
            }
        } catch (\PDOException $pEx) {
            $retorno = ['error' => true, 'code' => $pEx->getCode(), 'message' => $pEx->getMessage(), 'line' => $pEx->getLine(), 'file' => $pEx->getFile()];
        } catch (\Throwable $t) {
            $retorno = ['error' => true, 'code' => $t->getCode(), 'message' => $t->getMessage(), 'line' => $t->getLine(), 'file' => $t->getFile()];
        }
        $response->getBody()->write(json_encode($retorno));
        return $response;
    }
}
