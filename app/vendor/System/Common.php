<?php

declare(strict_types=1);

namespace System;

class Common
{
    public static function redirect($route): void
    {
        header("Location: {$route}");
    }

    public static function convertDateToDataBase(string $date): string
    {
        if (!empty($date)) {
            $aux = explode('/', $date);
            $aux = $aux[2] . '-' . $aux[1] . '-' . $aux[0];
            $dateTime = new \DateTime($aux, new \DateTimezone("America/Sao_Paulo"));
            return $dateTime->format('Y-m-d');
        }
        return '';
    }

    public static function convertDateDataBaseToBr(?string $date): ?string
    {
        if (!empty($date)) {
            return (new \DateTime($date, new \DateTimezone("America/Sao_Paulo")))->format('d/m/Y');
        }
        return null;
    }
}
