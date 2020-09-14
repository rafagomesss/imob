<?php

declare(strict_types=1);

namespace System;

class RequestAPI
{
    public static function sendRequest(string $url, array $params = [])
    {
        $sendPost = (bool) count($params);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, $sendPost);
        if ($sendPost) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resp = curl_exec($ch);
        curl_close($ch);
        if ($resp) {
            return json_decode($resp, true);
        }
        return ['error' => true, 'message' => 'Servidor fora do ar!'];
    }
}
