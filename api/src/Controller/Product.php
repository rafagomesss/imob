<?php

declare(strict_types=1);

namespace Api\Controller;

use Api\DB\Connection;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Product
{
    private function handleDataProduct(array $data, string $method = 'register'): array
    {
        $param = [
            'productCode' => 'code',
            'productName' => 'name',
            'productPrice' => 'price',
            'productExpiration' => 'expiration',
            'productDescription' => 'description',
        ];
        if ($method === 'update') {
            $param['idProduct'] = 'id';
        }
        $arr = [];
        foreach ($data as $key => $value) {
            $arr[$param[$key]] = empty($data[$key]) ? null : $value;
        }
        return $arr;
    }

    public function productRegister(Request $request, Response $response, $args)
    {
        try {
            $conn = Connection::getInstance();
            $data = $this->handleDataProduct($request->getParsedBody());
            $stmt = $conn->prepare(
                'INSERT INTO products (productCode, name, price, dateExpiration, description)
                VALUES (:code, :name, :price, :expiration, :description)'
            );
            $stmt->execute($data);
            $retorno = ['error' => true, 'message' => 'Erro ao inserir produto!'];
            if ($stmt->rowCount() > 0) {
                $retorno = ['message' => 'Produto cadastrado com sucesso!'];
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
            $stmt = $conn->query('CALL getAllProducts()');
            $retorno = ['error' => false, 'message' => 'Nenhum produto encontrado!'];
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

    public function getProduct(Request $request, Response $response, $args)
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

    public function update(Request $request, Response $response, $args)
    {
        try {
            $conn = Connection::getInstance();
            $data = $this->handleDataProduct($request->getParsedBody(), 'update');
            $stmt = $conn->prepare(
                'UPDATE products
                    SET productCode = :code,
                        name = :name,
                        price = :price,
                        dateExpiration = :expiration,
                        description = :description
                WHERE id = :id'
            );
            $stmt->execute($data);
            $retorno = ['error' => true, 'message' => 'Produto não encontrado!'];
            if ($stmt->execute($data) || $stmt->rowCount() > 0) {
                $retorno = ['message' => 'Produto atualizado com sucesso!'];
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
