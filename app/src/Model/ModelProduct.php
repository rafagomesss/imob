<?php

declare(strict_types=1);

namespace Imob\Model;

class ModelProduct
{
    public function registerProduct(array $param)
    {
        $retorno = (new RequestAPI)->sendRequest(URL_API . '/product/register', $param);
        return $retorno;
    }
}
