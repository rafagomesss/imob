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

    public static function encryptDecryptData(string $data, $decrypt = false): string
    {
        if (!empty($data)) {
            if ($decrypt) {
                return substr(base64_decode($data), 0, -5);
            }
            return base64_encode($data . '%$#@!');
        }
    }

    public static function consultZip(string $cep): array
    {
        $return = RequestAPI::sendRequest('viacep.com.br/ws/' . $cep . '/json/');
        return $return;
    }

    public static function listStates()
    {
        $return = RequestAPI::sendRequest('https://servicodados.ibge.gov.br/api/v1/localidades/estados');
        return $return;
    }
}
