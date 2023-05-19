<?php


namespace Models\Auth;

/**
 * @author Peter Mwambi
 * @date Mon Oct 05 2020 10:23:29 GMT+0300 (East Africa Time)
 * @updated Sat Dec 31 2022 08:36:58 GMT+0300 (East Africa Time)
 * @content Input Controller
 */

class Input
{
    /**
     * @param string type
     * @return bool|void
     * 
     * Checks if the form has been submitted via GET 
     * or POST Method and returns the method of submission
     */
    public static function getData($type = "post")
    {
        switch ($type) {
            case 'get':
                return (!empty($_GET)) ? true : false;
            case 'post':
                return (!empty($_POST)) ? true : false;
            default:
                return false;
        }
    }

    /**
     * @param string $data
     * @return string
     * 
     * Gets input from post or get data
     */

    public static function get($data)
    {
        switch ($data) {
            case isset($_POST[$data]):
                return $_POST[$data];
            case isset($_GET[$data]):
                return $_GET[$data];
            case isset($_FILES[$data]["name"]):
                return $_FILES[$data]["name"];
            default:
                return "";
        }
    }





    public static function GetParams(string $param)
    {
        switch ($param) {
            case 'get':
                return $_GET;
            case 'post':
                return $_POST;
        }

    }
}