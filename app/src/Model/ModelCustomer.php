<?php

declare(strict_types=1);

namespace Imob\Model;

use System\RequestAPI;

class ModelCustomer extends Model
{
    public function registerCustomer(array $param)
    {
        $return = RequestAPI::sendRequest(URL_API . '/customer/register', $param);
        $this->handleErrorServer($return, true);
        return $return;
    }

    public function updateCustomer(array $param)
    {
        $return = RequestAPI::sendRequest(URL_API . '/customer/update', $param);
        $this->handleErrorServer($return);
        return $return;
    }

    public function getAll(): array
    {
        $return = RequestAPI::sendRequest(URL_API . '/customer/customers');
        $this->handleErrorServer($return);
        return $return;
    }

    public function deleteCustomer(array $id)
    {
        $return = RequestAPI::sendRequest(URL_API . '/customer/delete', $id);
        $this->handleErrorServer($return, true);
        return $return;
    }

    public function editCustomer(array $param)
    {
        $return = RequestAPI::sendRequest(URL_API . '/customer/edit', $param);
        $this->handleErrorServer($return);
        return $return;
    }
}
