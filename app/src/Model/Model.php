<?php

declare(strict_types=1);

namespace Imob\Model;

use System\Common;
use System\Flash;

class Model
{
    protected function handleErrorServer(array $response, bool $ajax = false): void
    {
        if (!empty($response['error'])) {
            if ($ajax) {
                echo json_encode(['code' => $response['code'] ?? null, 'error' => true, 'message' => $response['message']]);
                exit();
            }
            Flash::set('danger', $response['message']);
            Common::redirect('/');
            exit();
        }
    }
}
