<?php

namespace GreenSMS\Utils;

class Helpers
{
    public static function isNullOrEmpty($str)
    {
        if (is_null($str)) {
            return true;
        }

        if (strlen($str) === 0) {
            return true;
        }

        return false;
    }

    public static function camelizeKeys($array)
    {
        $result = [];

        array_walk_recursive($array, function ($value, &$key) use (&$result) {
            $newKey = preg_replace_callback('/_([a-z])/', function ($matches) {
                return strtoupper($matches[1]);
            }, $key);

            $result[$newKey] = $value;
        });

        return $result;
    }

    public static function keyExistsAndTrue($key, $arr)
    {
        return array_key_exists($key, $arr) && $arr[$key];
    }
}
