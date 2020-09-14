<?php

declare(strict_types=1);

namespace Imob\Model;

use System\Common;
use System\Flash;
use System\RequestAPI;

class ModelProduct
{
    private function handleErrorServer(array $response, bool $ajax = false): void
    {
        if (!empty($response['error'])) {
            if ($ajax) {
                echo json_encode(['error' => true, 'message' => $response['message']]);
                exit();
            }
            Flash::set('danger', $response['message']);
            Common::redirect('/');
            exit();
        }
    }
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
        $this->handleErrorServer($return);
        return $return;
    }

    public function editProduct(array $param)
    {
        $return = RequestAPI::sendRequest(URL_API . '/product/edit', $param);
        $this->handleErrorServer($return);
        return $return;
    }
}
