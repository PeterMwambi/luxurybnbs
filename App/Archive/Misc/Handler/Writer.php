<?php

namespace Models\Core\App\Data\Helpers;

use Exception;

class Writer
{

    private $_string;

    private $_methodBoundary = array();

    private $_keys = array();

    private $_newKeys = array();

    private function _WriteMethodCallAsString(string $string)
    {
        $this->_string = $string;
        return;
    }

    private function _GetMethodCallAsString()
    {
        if (!empty($this->_string)) {
            return $this->_string;
        } else {
            throw new Exception("Warning: Method call string has not been defined");
        }
    }

    private function _WriteMethodBoundary()
    {
        $this->_methodBoundary = explode("/", $this->_GetMethodCallAsString());
    }

    private function _GetMethodBoundary()
    {
        if (count($this->_methodBoundary)) {
            return $this->_methodBoundary;
        } else {
            throw new Exception("Warning: Method boundary has not been defined");
        }
    }

    private function _GetMethodBoundaryKeys()
    {
        return array_keys($this->_GetMethodBoundary());
    }

    private function _WriteNewKeys(array $keys)
    {
        $this->_newKeys = $keys;
    }

    private function _GetNewKeys()
    {
        if (count($this->_newKeys)) {
            return $this->_newKeys;
        } else {
            throw new Exception("Warning: No new keys defined");
        }
    }

    private function _ReplaceMethodBoundaryKeys()
    {
        $oldKeys = $this->_GetMethodBoundaryKeys();
        $newKeys = $this->_GetNewKeys();
        $this->_keys = array_replace($oldKeys, $newKeys);
    }

    private function _GetNewMethodBoundaryKeys()
    {
        if (count($this->_keys)) {
            return $this->_keys;
        } else {
            throw new Exception("Warning: No replaced keys were found");
        }
    }


    private function _WriteNewMethodBoundary()
    {
        $this->_ReplaceMethodBoundaryKeys();
        $keys = $this->_GetNewMethodBoundaryKeys();
        $values = array_values($this->_GetMethodBoundary());
        $this->_methodBoundary = array_combine($keys, $values);
    }


    public function FormatString(string $string, array $keys)
    {
        $this->_WriteMethodCallAsString($string);
        $this->_WriteMethodBoundary();
        $this->_WriteNewKeys($keys);
        $this->_WriteNewMethodBoundary();
        return $this->_GetMethodBoundary();
    }


}