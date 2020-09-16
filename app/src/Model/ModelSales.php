<?php

declare(strict_types=1);

namespace Imob\Model;

use System\RequestAPI;

class ModelSales extends Model
{
    public function getProductByCodeAndName(array $param)
    {
        $return = RequestAPI::sendRequest(URL_API . '/product/getProductByNameCode', $param);
        $this->handleErrorServer($return, true);
        return $return;
    }
}
