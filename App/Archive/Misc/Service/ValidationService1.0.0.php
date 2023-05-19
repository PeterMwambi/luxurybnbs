<?php
namespace Misc;

use Controllers\Controller;
use Exception;

/**
 * @author Peter Mwambi
 * @content Validation Class
 * @time Wed Dec 30 2020 10:27:13 GMT+0300 (East Africa Time)
 * @updated on Sat Feb 20 2021 17:50:05 GMT+0300 (East Africa Time)
 * 
 * Next Version should make use of http response codes on errors
 */


class Service extends Controller
{

    private array $_data;

    private $_passed = false;
    private $_errors = array();


    protected function SetData(array $data)
    {
        $this->_data = $data;
    }

    private function _GetData()
    {
        if (count($this->_data)) {
            return $this->_data;
        } else {
            throw new Exception("Warning: Form data is required");
        }
    }

    protected function Execute()
    {
        $data = $this->_GetData();
        $rules = parent::GetRules();
        foreach ($rules as $key => $keywords) {
            foreach ($keywords as $keyword => $value) {
                switch ($keyword) {
                    case "required":
                        switch ($value) {
                            case true:
                                if (empty($this->_data[$key])) {
                                    $this->_BindError("Your " . strtolower($key) . " is required");
                                    return;
                                }
                                break;
                            case false:
                                if (isset($keywords->any)) {
                                    if (count($keywords->any)) {
                                        $items = $keywords->any;
                                        $test = false;
                                        foreach ($items as $item) {
                                            if (!empty($data[$item])) {
                                                $test = true;
                                            }
                                        }
                                        if (!$test) {
                                            $this->_BindError("Either a " . strtolower(implode(" or an ", $items)) . " is required");
                                            return;
                                        }
                                    }
                                } else {
                                    if (empty($data[$key])) {
                                        return;
                                    }
                                }
                                break;
                        }
                        break;

                    case "matches":
                        if (!empty($data[$key]) && $data[$key] !== $data[$value]) {
                            $this->_BindError("Your {$value} does not match {$key}");
                            return;
                        }
                        break;
                    case "min":
                        if (isset($keywords->constant) && $keywords->constant === "int") {
                            if (!empty($data[$key]) && $data[$key] < $value) {
                                $this->_BindError("Your " . strtolower($key) . " cannot be less than {$value}");
                                return;
                            }
                        } else {
                            if (!empty($data[$key]) && strlen($data[$key]) < $value) {
                                $this->_BindError("Your " . strtolower($key) . " cannot be shorter than {$value} characters");
                                return;
                            }
                        }
                        break;
                    case "max":
                        if (isset($keywords->constant) && $keywords->constant === "int") {
                            if (!empty($data[$key]) && $data[$key] > $value) {
                                $this->_BindError("Your " . strtolower($key) . " cannot be more than {$value}");
                                return;
                            }
                        } else {
                            if (!empty($data[$key]) && (strlen($data[$key]) > $value)) {
                                $this->_BindError("Your " . strtolower($key) . " cannot be greater than {$value} characters");
                                return;
                            }
                        }

                        break;
                    case "pattern":
                        if (!empty($data[$key]) && !preg_match($value, $data[$key])) {
                            $this->_BindError("Your " . strtolower($key) . " contains invalid characters");
                            return;
                        }
                        break;
                    case "constant":
                        if (!empty($data[$key]) && !filter_var($data[$key], $this->_GetConstant($value))) {
                            $this->_BindError("Your " . strtolower($key) . " is invalid");
                            return;
                        }
                        break;
                    case "values":
                        if (!empty($data[$key]) && !in_array($data[$key], $value)) {
                            $this->_BindError("Your " . strtolower($key) . " contains an invalid value");
                            return;
                        }
                        break;
                    case "different":
                        foreach ($value as $item) {
                            if ($data[$key] === $data[$item]) {
                                $this->_BindError("Your {$key} cannot be the same as {$item}");
                                return;
                            }
                        }
                        break;
                }
            }
        }
    }


    private function _GetConstant(string $alias)
    {
        switch ($alias) {
            case "int":
                return FILTER_VALIDATE_INT;
            case "email":
                return FILTER_VALIDATE_EMAIL;
        }
    }

    private function _BindError(string $error)
    {
        $this->_errors[] = $error;
    }

    public function Confirm()
    {
        if (empty($this->_errors)) {
            $this->_passed = true;
        }
        return $this->_passed;
    }

    public function GetErrorMessage()
    {
        if (count($this->_errors)) {
            foreach ($this->_errors as $error) {
                return $error;
            }
        }
    }

}