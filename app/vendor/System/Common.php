<?php

declare(strict_types=1);

namespace System;

class Common
{
    public static function redirect($route): void
    {
        header("Location: {$route}");
    }
}