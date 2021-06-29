<?php

namespace Imrancse\Letterstream\Utils;

class Curl
{
    const CONNECT_TIMEOUT = 10;
    const READ_TIMEOUT = 150;

    public static function get($url)
    {
        return self::request($url, array(
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_CONNECTTIMEOUT => self::CONNECT_TIMEOUT,
            CURLOPT_TIMEOUT => self::READ_TIMEOUT,
            CURLOPT_RETURNTRANSFER => true
        ));
    }

    public static function post($url, $content)
    {
        return self::request($url, array(
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_CONNECTTIMEOUT => self::CONNECT_TIMEOUT,
            CURLOPT_TIMEOUT => self::READ_TIMEOUT,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => $content
        ));
    }

    public static function put($url, $content)
    {
        return self::request($url, array(
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_CONNECTTIMEOUT => self::CONNECT_TIMEOUT,
            CURLOPT_TIMEOUT => self::READ_TIMEOUT,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => $content
        ));
    }

    public static function delete($url)
    {
        return self::request($url, array(
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_CONNECTTIMEOUT => self::CONNECT_TIMEOUT,
            CURLOPT_TIMEOUT => self::READ_TIMEOUT,
            CURLOPT_RETURNTRANSFER => true
        ));
    }

    private static function request($url, $options)
    {
        $request = curl_init($url);

        curl_setopt_array($request, $options);

        $response = curl_exec($request);
        
        if ($response === false) {
            throw new \Exception(curl_error($request), curl_errno($request));
        }

        curl_close($request);
        unset($request); // PHP 8.0
        return $response;
    }
}
