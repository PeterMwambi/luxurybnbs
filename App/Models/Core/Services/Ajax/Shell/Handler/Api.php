<?php


namespace Models\Core\Services\Ajax\Shell\Handler;

use Exception;

class Api extends Service
{

    /**
     * Summary of instance
     * @var Api
     */
    private static $instance = null;

    /**
     * Summary of run
     * @return Api|null
     */
    public static function run()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Api;
        }
        return self::$instance;
    }

    /**
     * Summary of formService
     * @param string $identifier
     * @return void
     */
    public function formService(string $identifier)
    {
        if (parent::runSecurityService($identifier)) {
            parent::runFormService();
            die;
        } else {
            throw new Exception("Warning: Invalid form service identifier");
        }

    }
}