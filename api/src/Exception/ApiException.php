<?php

declare(strict_types=1);

namespace Api\Exception;

class ApiException
{
    public static function printException(object $objEx): void
    {
        echo json_encode(
            [
                'error' => true,
                'code' => $objEx->getCode(),
                'message' => $objEx->getMessage() .
                    ' - [On File: ' . $objEx->getFile() . ' - Line: ' . $objEx->getLine() . ']',
            ]
        );
    }
}
