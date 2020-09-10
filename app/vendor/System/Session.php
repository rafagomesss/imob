<?php

declare(strict_types=1);

namespace System;

class Session
{
    public static function sessionStart(): void
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function get(string $key)
    {
        return $_SESSION[$key] ?? null;
    }

    public static function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function delete(string $key): void
    {
        if (!empty($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    public static function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    public static function destroySession(): void
    {
        session_destroy();
    }

    public static function validateSessionUser(): bool
    {
        return self::has('USER') && self::has('ACCESS_LEVEL');
    }
}
