<?php

namespace Models\Core\App\Validation\Shell;

use Exception;
use Models\Core\App\Validation\Kernel\Service as ValidationService;

/**
 * @author Peter Mwambi
 * @content Validation API
 * @date Mon May 24 2021 01:10:58 GMT+0300 (East Africa Time)
 * @updated Sat Dec 03 2022 14:07:51 GMT+0300 (East Africa Time)
 *
 * Receives and Processes form requests
 */

class Api extends ValidationService
{
    /**
     * Summary of data
     * @var array
     */
    private $data = array();


    /**
     * Summary of errorBag
     * @var object
     */
    private $errorBag = null;


    /**
     * Summary of rules
     * @var object
     */
    private $rules = null;

    /**
     * @return mixed
     */
    private function getErrorBag()
    {
        if (is_object($this->errorBag)) {
            return $this->errorBag;
        } else {
            throw new Exception("Warning: Validation error bag has not been defined");
        }
    }

    /**
     * @param object $errorBag 
     * @return self
     */
    public function setErrorBag(object $errorBag): self
    {
        $this->errorBag = $errorBag;
        return $this;
    }

    /**
     * @return mixed
     */
    private function getRules()
    {
        if (is_object($this->rules)) {
            return $this->rules;
        } else {
            throw new Exception("Warning: Validation rules have not been defined");
        }
    }

    /**
     * @param object $rules 
     * @return self
     */
    public function setRules(object $rules): self
    {
        $this->rules = $rules;
        return $this;
    }
    /**
     * @return array
     */
    public function getData()
    {
        if (count($this->data)) {
            return $this->data;
        } else {
            throw new Exception("Warning: Validation data has not been defined");
        }
    }

    /**
     * @param array $data 
     * @return self
     */
    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }

    public function runRequest()
    {
        return parent::execute($this->getData(), $this->getRules(), $this->getErrorBag());
    }
}