<?php

declare(strict_types=1);

namespace Api\Controller;

use Api\DB\Connection;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Customer
{
    private function handleDataCustomer(array $data, string $method = 'register'): array
    {
        $param = [
            'customerName' => 'name',
            'customerCpf' => 'cpf',
            'customerDateBirth' => 'dateBirth',
            'customerEmail' => 'email',
            'customerCep' => 'zipCode',
            'customerUf' => 'state',
            'customerCity' => 'city',
            'customerAddress' => 'address',
            'customerComplement' => 'complement',
            'customerCellphone' => 'cellphone',
            'customerGender' => 'gender',
            'customerContact' => 'contact',
        ];
        if ($method === 'update') {
            $param['customerId'] = 'id';
        }
        $arr = [];
        foreach ($data as $key => $value) {
            $arr[$param[$key]] = empty($data[$key]) ? null : $value;
        }
        return $arr;
    }

    public function getAllCustomers(Request $request, Response $response, $args)
    {
        try {
            $conn = Connection::getInstance();
            $stmt = $conn->query('SELECT * FROM customers');
            $retorno = ['error' => false, 'message' => 'Nenhum usuário encontrado!'];
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
            $stmt = $conn->prepare('DELETE FROM customers WHERE id = :id');
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            $retorno = ['error' => true, 'message' => 'Cliente não existe!'];
            if ($stmt->rowCount() > 0) {
                $retorno = ['message' => 'Cliente excluído com sucesso!'];
            }
        } catch (\PDOException $pEx) {
            $retorno = ['error' => true, 'code' => $pEx->getCode(), 'message' => $pEx->getMessage(), 'line' => $pEx->getLine(), 'file' => $pEx->getFile()];
        }
        $response->getBody()->write(json_encode($retorno));
        return $response;
    }

    public function getCustomer(Request $request, Response $response, $args)
    {
        try {
            $conn = Connection::getInstance();
            $id = $request->getParsedBody()['id'];
            $stmt = $conn->prepare('SELECT * FROM customers WHERE id = :id');
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            $retorno = ['error' => true, 'message' => 'Cliente não encontrado!'];
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

    public function customerRegister(Request $request, Response $response, $args)
    {
        try {
            $conn = Connection::getInstance();
            $data = $this->handleDataCustomer($request->getParsedBody());
            $stmt = $conn->prepare(
                'INSERT INTO customers ( name, cpf, dateBirth, email, zipCode, state, city, address, complement,
                    cellphone,
                    gender,
                    contact
                ) VALUES (:name, :cpf, :dateBirth, :email, :zipCode, :state, :city, :address, :complement, :cellphone,
                    :gender,
                    :contact
                )'
            );
            $stmt->execute($data);
            $retorno = ['error' => true, 'message' => 'Erro ao inserir cliente!'];
            if ($stmt->rowCount() > 0) {
                $retorno = ['message' => 'Cliente cadastrado com sucesso!'];
            }
        } catch (\PDOException $pEx) {
            $retorno = ['error' => true, 'code' => $pEx->getCode(), 'message' => $pEx->getMessage(), 'line' => $pEx->getLine(), 'file' => $pEx->getFile()];
        }
        $response->getBody()->write(json_encode($retorno));
        return $response;
    }
}
