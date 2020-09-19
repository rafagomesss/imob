<?php

declare(strict_types=1);

namespace Api\Controller;

use Api\DB\Connection;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Customer
{
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
}
