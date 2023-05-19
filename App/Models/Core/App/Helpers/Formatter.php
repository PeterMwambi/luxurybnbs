<?php

namespace Models\Core\App\Helpers;

final class Formatter extends DataTypes
{
    private static $_instance;

    public static function run()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new Formatter;
        }
        return self::$_instance;
    }

    public static function getArrayKeys(array $array)
    {
        return array_keys($array);
    }


    public function formatArray(array $array, array $keys)
    {
        return parent::runArrayWriter($array, $keys);
    }

    public function formatStringToArray(string $string, array $keys = [])
    {
        parent::setString($string);
        parent::setFormatterKeys($keys);
        return parent::runFormatter("array");
    }

    public function formatStringToObject(string $string, array $keys = [])
    {
        parent::setString($string);
        parent::setFormatterKeys($keys);
        return (parent::runFormatter("object"));
    }
}