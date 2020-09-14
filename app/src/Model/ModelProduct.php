<?php

declare(strict_types=1);

namespace Imob\Model;

use System\RequestAPI;

class ModelProduct
{
    public function registerProduct(array $param)
    {
        return RequestAPI::sendRequest(URL_API . '/product/register', $param);
    }

    public function updateProduct(array $param)
    {
        return RequestAPI::sendRequest(URL_API . '/product/update', $param);
    }

    public function getAll(): array
    {
        return RequestAPI::sendRequest(URL_API . '/product/listAll');
    }

    public function deleteProduct(array $id)
    {
        return RequestAPI::sendRequest(URL_API . '/product/delete', $id);
    }

    public function editProduct(array $param)
    {
        return RequestAPI::sendRequest(URL_API . '/product/edit', $param);
    }
}
