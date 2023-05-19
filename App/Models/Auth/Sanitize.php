<?php
namespace Models\Auth;

/**
 * @author Peter Mwambi
 * @content Sanitize library
 * @time Sun Nov 22 2020 14:37:18 GMT+0300 (East Africa Time)
 * @updated Mon Sep 19 2022 09:47:40 GMT+0300 (East Africa Time)
 * 
 * Contains static methods to filter form input
 */

class Sanitize
{

    public static function string($data)
    {
        $data = filter_var(trim($data), FILTER_SANITIZE_SPECIAL_CHARS);
        return $data;
    }
    public static function int($data)
    {
        $data = filter_var($data, FILTER_VALIDATE_INT);
        return $data;
    }
    public static function bool($data)
    {
        $data = filter_var($data, FILTER_VALIDATE_BOOLEAN);
        return $data;
    }
    public static function email($email)
    {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        return $email;
    }
}