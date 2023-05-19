<?php

namespace Views\Includes\Components\Classes;

use Models\Components\PageComponent;

class Page extends PageComponent
{

    /**
     * Summary of instance
     * @var PageComponent
     */
    private static $instance = null;

    /**
     * Summary of run
     * @return Page|PageComponent|null
     */
    public static function run()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Page;
        }
        return self::$instance;
    }
    public function runSetup()
    {
        parent::render();
    }

    public static function date()
    {
        self::run()->setDate();
        return self::run()->getDate();
    }
    public static function runAuth(array $authPages, string $authIdentifier, string $authTokenIdentifier, string $redirectPage)
    {
        self::run()->setAuthPages($authPages);
        self::run()->setAuthIdentifier($authIdentifier);
        self::run()->setAuthTokenIdentifier($authTokenIdentifier);
        self::run()->setRedirectPage($redirectPage);
        self::run()->verifyUser();
        if (!self::run()->hasAuth()) {
            die(header("location: " . self::run()->getRedirectPage()));
        } else {
            self::run()->setHasAuth(true);
        }
    }
}