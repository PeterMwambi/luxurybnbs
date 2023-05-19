<?php

namespace Models\Core\App\Helpers;

use Exception;


class DataTypes extends Writer
{


    private $string;


    private $objectBoundary;

    private $formatterKeys = array();

    private $formattedResult = null;

    private function writeObjectFromString(string $string)
    {
        $this->string = $string;
        return;
    }


    private function getObjectFromString()
    {
        if (!empty($this->string)) {
            return $this->string;
        } else {
            throw new Exception("Warning: Object caller string has not been defined");
        }
    }

    private function writeObjectBoundary()
    {
        $this->objectBoundary = explode("/", $this->getObjectFromString());
        return $this;
    }

    private function getObjectBoundary()
    {
        if (count($this->objectBoundary)) {
            return $this->objectBoundary;
        } else {
            throw new Exception("Warning: Object boundary array has not been defined");
        }
    }

    private function format(string $string, array $keys)
    {
        $this->writeObjectFromString($string);
        $this->writeObjectBoundary();
        return parent::runArrayWriter($this->getObjectBoundary(), $keys);
    }


    protected function setString(string $string)
    {
        $this->string = $string;
        return $this;
    }

    public static function formatToArray(mixed $data)
    {
        return ((array) $data);
    }

    public static function formatToObject(array $array)
    {
        return ((object) $array);
    }

    private function getString()
    {
        if (!empty($this->string)) {
            return $this->string;
        } else {
            throw new Exception("Warning: Object String has not been defined");
        }
    }

    protected function runFormatter(string $type = "")
    {
        $array = count($this->getFormatterKeys()) ? $this->getFormatterKeys() : ["class", "method"];
        switch ($type) {
            case "object":
                $this->setFormattedResult(self::formatToObject($this->format($this->getString(), $array)));
                return self::formatToObject($this->format($this->getString(), $array));
            case "array":
                $this->setFormattedResult(self::formatToArray($this->format($this->getString(), $array)));
                return self::formatToArray($this->format($this->getString(), $array));
        }
        ;
    }
    public function getClass()
    {
        return $this->getFormattedResult()->class;
    }

    public function getMethod()
    {
        return $this->getFormattedResult()->method;
    }


    /**
     * @return array
     */
    public function getFormatterKeys()
    {
        return $this->formatterKeys;
    }

    /**
     * @param array $formatterKeys 
     * @return self
     */
    public function setFormatterKeys(array $formatterKeys): self
    {
        $this->formatterKeys = $formatterKeys;
        return $this;
    }

    public static function verifyProperty(object $object_or_class, string $string)
    {
        if (property_exists($object_or_class, $string)) {
            return true;
        } else {
            return false;
        }
    }

    public static function verifyClass(string $class)
    {
        if (class_exists($class)) {
            return true;
        } else {
            return false;
        }
    }

    public static function verifyMethod(object $class, string $method)
    {
        if (method_exists($class, $method)) {
            return true;
        } else {
            return false;
        }
    }

    public static function verifyArrayKey(string $key, array $array, )
    {
        if (array_key_exists($key, $array)) {
            return true;
        } else {
            return false;
        }
    }

    public static function verifyInArray(string $key, array $array)
    {
        if (in_array($key, $array)) {
            return true;
        } else {
            return false;
        }
    }

    public static function verifyFunction(string $function)
    {
        if (function_exists($function)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return array|object
     */
    private function getFormattedResult()
    {
        return $this->formattedResult;
    }

    /**
     * @param mixed $formattedResult 
     * @return self
     */
    private function setFormattedResult(mixed $formattedResult): self
    {
        $this->formattedResult = $formattedResult;
        return $this;
    }
}