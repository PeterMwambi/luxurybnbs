<?php

namespace Models\Core\App\Utilities;


class Autoloader
{

    private static $instance = null;

    public static function start()
    {
        if (!isset(self::$instance)):
            self::$instance = new Autoloader;
        endif;
        return self::$instance;
    }

    public function __construct()
    {
        spl_autoload_register(
            function ($className) {
                $rootDir = str_replace("Models\Core\App\Utilities", "", dirname(__FILE__));
                $fileURI = $rootDir . $className . ".php";
                include_once $fileURI;
            }
        );
        date_default_timezone_set("Africa/Nairobi");
    }

}