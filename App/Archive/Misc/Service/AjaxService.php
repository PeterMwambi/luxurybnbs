<?php


namespace Misc;

use Exception;
use Models\Core\App\Cache\Storage;
use Models\Core\App\Database\Writer\Write;
use Models\Core\Services\Ajax\Kernel\Request;

final class Service extends Request
{


    private $_message = array();

    private $_data = array();

    private $_rules = "";

    private $_errors = "";

    private $_action = "";

    private $_method = "";

    private $_finalSuccessMessage = "";

    private $_finalErrorMessage = "";

    private $_nextAction = "";

    private $_finalMethod = "";

    public function writeData(array $data)
    {
        $this->_data = $data;
        return;
    }
    public function writeRulePath(string $path)
    {
        $this->_rules = $path;
        return;
    }

    public function writeErrorPath(string $path)
    {
        $this->_errors = $path;
        return;
    }

    public function writeAction(string $action)
    {
        $this->_action = $action;
        return;
    }

    public function writeMethod(string $method)
    {
        $this->_method = $method;
        return;
    }

    public function writeFinalErrorMessage(string $message)
    {
        $this->_finalErrorMessage = $message;
        return;
    }


    public function writeFinalSuccessMessage(string $message)
    {
        $this->_finalSuccessMessage = $message;
        return;
    }

    public function writeNextAction(string $next)
    {
        $this->_nextAction = $next;
        return;
    }


    public function writeFinalMethod(string $method)
    {
        $this->_finalMethod = $method;
        return;
    }


    public function runService()
    {
        return $this->_runService();
    }

    private function _runService()
    {
        $this->_LoadData();
        if (count($this->_data)) {
            parent::writeRules($this->_rules);
            parent::writeErrors($this->_errors);
            parent::setFormData($this->_data);
            if (parent::validate()) {
                $this->_assignToService($this->_action, $this->_data, $this->_finalSuccessMessage, $this->_finalErrorMessage, $this->_nextAction);
            } else {
                $this->_generateMessage(parent::GetErrorMessage(), 0);
            }
        }
        $this->_displayMessage();
        return;
    }

    private function _generateMessage(string $message, int $flag, string $next = null)
    {
        if (!empty($next)) {
            $this->_message = array("message" => $message, "flag" => $flag, "next" => $next);
            return;
        } else {
            $this->_message = array("message" => $message, "flag" => $flag);
            return;
        }
    }

    private function _displayMessage()
    {
        if (count($this->_message)) {
            echo json_encode($this->_message);
            return;
        } else {
            throw new Exception("Warning: No messages found");
        }
    }
    private function _loadData()
    {
        switch (parent::GetForm()) {
            case parent::GetForm():
                $this->_rules = $this->_GetRulePath();
                $this->_errors = $this->_GetErrorPath();
                $this->_action = $this->_GetAction();
                $this->_method = $this->_GetMethod();
                $this->_finalSuccessMessage = $this->_GetFinalSuccessMessage();
                $this->_finalErrorMessage = $this->_GetFinalErrorMessage();
                $this->_data = $this->_GetData();
                $this->_nextAction = $this->_GetNextAction();
                break;
        }
    }

    private function _assignToService(string $action, array $data, string $successMessage, string $errorMessage, string $next = null)
    {
        switch ($action) {
            case "StoreToCache":
                $method = $this->_method;
                $storage = new Storage;
                if (method_exists($storage, $method)) {
                    Storage::$method(array(parent::GetForm() => $data));
                    if ($this->_checkIfStepIsFinal($next)) {
                        $writer = new Write;
                        $writer->writeData(Storage::GetCachedData());
                        if ($this->_runFinalMethod($writer)) {
                            $this->_generateMessage($successMessage, 1, $next);
                            return;
                        } else {
                            $this->_generateMessage($errorMessage, 0);
                            return;
                        }
                    }
                    $this->_generateMessage($successMessage, 1, $next);
                    return;
                } else {
                    $this->_generateMessage($errorMessage, 0);
                }
                break;
        }
        return;
    }


    private function _runFinalMethod(object $class)
    {
        if ($this->_validateFinalMethod($class)) {
            $method = $this->_GetFinalMethod();
            return $class->$method();
        } else {
            return false;
        }
    }

    private function _validateFinalMethod(object $class)
    {
        if (method_exists($class, $this->_getFinalMethod())) {
            return true;
        } else {
            return false;
        }
    }

    private function _checkIfStepIsFinal(string $step)
    {
        if ($step === "GoToFinalStep") {
            return true;
        } else {
            return false;
        }
    }


    private function _getFinalMethod()
    {
        if (!empty($this->_finalMethod)) {
            return $this->_finalMethod;
        } else {
            throw new Exception("Final method has not been declared");
        }
    }


    private function _getFinalErrorMessage()
    {
        if (!empty($this->_finalErrorMessage)) {
            return $this->_finalErrorMessage;
        }
    }

    private function _getFinalSuccessMessage()
    {
        if (!empty($this->_finalSuccessMessage)) {
            return $this->_finalSuccessMessage;
        }
    }


    private function _getMethod()
    {
        return $this->_method;
    }


    private function _getAction()
    {
        if (!empty($this->_action)) {
            return $this->_action;
        }
    }


    private function _getNextAction()
    {
        if (!empty($this->_nextAction)) {
            return $this->_nextAction;
        }
    }



    private function _getData()
    {
        if (count($this->_data)) {
            return $this->_data;
        }
    }



    private function _getRulePath()
    {
        if (!empty($this->_rules)) {
            return $this->_rules;
        }
    }

    private function _getErrorPath()
    {
        if (!empty($this->_errors)) {
            return $this->_errors;
        }
    }
}