<?php

declare(strict_types=1);

namespace Imob\Model;

use System\Common;
use System\Flash;
use System\RequestAPI;

class ModelProduct extends Model
{
    public function registerProduct(array $param)
    {
        $return = RequestAPI::sendRequest(URL_API . '/product/register', $param);
        $this->handleErrorServer($return, true);
        return $return;
    }

    public function updateProduct(array $param)
    {
        $return = RequestAPI::sendRequest(URL_API . '/product/update', $param);
        $this->handleErrorServer($return);
        return $return;
    }

    public function getAll(): array
    {
        $return = RequestAPI::sendRequest(URL_API . '/product/listAll');
        $this->handleErrorServer($return);
        return $return;
    }

    public function deleteProduct(array $id)
    {
        $return = RequestAPI::sendRequest(URL_API . '/product/delete', $id);
        $this->handleErrorServer($return, true);
        return $return;
    }

    public function editProduct(array $param)
    {
        $return = RequestAPI::sendRequest(URL_API . '/product/edit', $param);
        $this->handleErrorServer($return);
        return $return;
    }
}
