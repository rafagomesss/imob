<?php

declare(strict_types=1);

namespace System;

class Flash
{
    public static function set(string $key, $value)
    {
        Session::set($key, $value);
    }

    public static function get(string $key)
    {
        $msg = Session::get($key);
        Session::delete($key);
        return $msg;
    }
}
