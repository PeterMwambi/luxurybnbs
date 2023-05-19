<?php

namespace Models\Core\App\Helpers;

use Exception;


class Writer
{

    private $array = array();

    private $keys = array();

    private $newKeys = array();


    private function setArray(array $array)
    {
        $this->array = $array;
    }


    private function getArray()
    {
        if (count($this->array)) {
            return $this->array;
        } else {
            throw new Exception("Warning: Array has not been defined");
        }
    }


    private function writeArrayKeys()
    {
        $this->keys = array_keys($this->getArray());
    }

    private function getArrayKeys()
    {
        if (count($this->keys)) {
            return $this->keys;
        } else {
            throw new Exception("Warning: Array keys have not been defined");
        }
    }

    private function writeNewArrayKeys(array $keys)
    {
        $this->newKeys = $keys;
    }


    private function getNewArrayKeys()
    {
        if (count($this->newKeys)) {
            return $this->newKeys;
        } else {
            throw new Exception("Warning: No new array keys were defined");
        }
    }

    private function replaceOldArrayKeysWithNew()
    {
        $this->keys = array_replace($this->getArrayKeys(), $this->getNewArrayKeys());
    }

    private function getNewArray()
    {
        $this->replaceOldArrayKeysWithNew();
        return (array_combine($this->getArrayKeys(), array_values($this->getArray())));
    }


    public function runArrayWriter(array $array, array $keys)
    {
        $this->setArray($array);
        $this->writeArrayKeys();
        $this->writeNewArrayKeys($keys);
        return $this->getNewArray();
    }


}