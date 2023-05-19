<?php

namespace Models\Core\App\Database\Kernel;

defined("ALLOW_DBCONNECT_ACCESS") or Exit("Connect Warning: You are not allowed to access this script");

use Models\Core\App\Database\Kernel\Config;
use PDO;
use PDOException;

final class Connect extends Config
{

    private $conn;

    private $message;

    private static $instance;

    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ];


    private function __construct()
    {
        try {
            $this->conn = new PDO(
                "mysql:host=" . parent::host() .
                ";dbname=" . parent::DBName(),
                parent::username(),
                parent::password(),
                    $this->options
            );
        } catch (PDOException $e) {
            $this->message = $e->getMessage();
        }

    }

    public function getLiveConnection()
    {
        return $this->conn;
    }


    public function getConnectionErrorMessage()
    {
        return $this->message;
    }

    public function verifyConnection()
    {
        if (empty($this->message)) {
            return true;
        }
        return false;
    }

    public static function start()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Connect;
        }
        return self::$instance;
    }

}