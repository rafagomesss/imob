<?php

declare(strict_types=1);

namespace System;

class Router
{
    public static function run(Request $request)
    {
        echo '<pre>' . print_r($request, true) . '</pre>';
        exit();
    }
}
