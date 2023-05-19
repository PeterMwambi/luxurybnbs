<?php

namespace Models\Core\App\Dependancies;

use Exception;
use Models\Core\App\Helpers\Formatter;

class Namespaces extends Dependancies
{

    /**
     * Summary of namespaceObject
     * @var object
     */
    private $namespaceObject = null;

    /**
     * Summary of instance
     * @var Namespaces|null
     */
    private static $instance = null;


    /**
     * Summary of run
     * @return Namespaces
     */
    public static function run()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Namespaces;
        }
        return self::$instance;
    }



    /**
     * Summary of namespaceObject
     * @return object
     */
    public function getNamespaceObject()
    {
        return $this->namespaceObject;
    }

    /**
     * Summary of namespaceObject
     * @return self
     */
    public function setNamespaceObject(): self
    {
        $this->namespaceObject = parent::dependancy("dependancies/namespaces");
        return $this;
    }



    /**
     * Summary of getClass
     * @param string $identifier
     * @throws Exception
     * @return string
     */
    public static function getClass(string $identifier)
    {
        self::run()->setNamespaceObject();
        if (Formatter::verifyProperty(self::run()->getNamespaceObject(), $identifier)) {
            return self::run()->getNamespaceObject()->$identifier;
        } else {
            throw new Exception("Warning: Invalid class identifier");
        }
    }



}