<?php


namespace Models\Core\Services\Ajax\Shell\Handler;

use Exception;
use Models\Core\App\Cache\Storage;
use Models\Core\App\Dependancies\Namespaces;
use Models\Core\App\Helpers\Formatter;
use Models\Core\App\Validation\Shell\Api as ValidationApi;
use Models\Core\Services\Ajax\Shell\Data\DataSettings;

class Service extends DataSettings
{



    /**
     * Summary of message
     * @var array
     */
    private $message = array("message" => null, "flag" => 0);

    /**
     * Summary of nextStep
     * @var mixed
     */
    private $nextStep = "";


    /**
     * Summary of method
     * @var string
     */
    private $method = "";


    /**
     * Summary of formattedMethod
     * @var array
     */
    private $formattedMethod = array();

    /**
     * Summary of data
     * @var mixed
     */
    private $data = array();

    /**
     * Summary of form
     * @var string
     */
    private $form = "";


    /**
     * Summary of successStatus
     * @var bool
     */
    private $successStatus = false;


    /**
     * Summary of message
     * @return array
     */
    protected function getMessage()
    {
        if (count($this->message)) {
            return $this->message;
        } else {
            throw new Exception("Warning: Message has not been defined");
        }
    }

    /**
     * Summary of message
     * @param array $message Summary of message
     * @return self
     */
    protected function setMessage(array $message): self
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        if (!empty($this->method)) {
            return $this->method;
        } else {
            throw new Exception("Warning: Method has not been defined");
        }
    }

    /**
     * @param string $method 
     * @return self
     */
    protected function setMethod(string $method): self
    {
        $this->method = $method;
        return $this;
    }


    /**
     * Summary of formattedMethod
     * @return array
     */
    protected function getFormattedMethod()
    {
        if (count($this->formattedMethod)) {
            return $this->formattedMethod;
        } else {
            throw new Exception("Warning: Formatted method has not been defined");
        }
    }

    /**
     * Summary of formattedMethod
     * @param array $formattedMethod Summary of formattedMethod
     * @return self
     */
    protected function setFormattedMethod(array $formattedMethod): self
    {
        $this->formattedMethod = $formattedMethod;
        return $this;
    }


    /**
     * Summary of data
     * @return array
     */
    protected function getData()
    {
        return $this->data;
    }

    /**
     * Summary of data
     * @param array $data Summary of data
     * @return self
     */
    protected function setData(array $data): self
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Summary of form
     * @return string
     */
    protected function getForm()
    {
        if (!empty($this->form)) {
            return $this->form;
        } else {
            throw new Exception("Warning: Form has not been defined");
        }
    }

    /**
     * Summary of form
     * @param string $form Summary of form
     * @return self
     */
    protected function setForm($form): self
    {
        $this->form = $form;
        return $this;
    }

    /**
     * Summary of successStatus
     * @return bool
     */
    protected function hasSuccess()
    {
        return $this->successStatus;
    }

    /**
     * Summary of successStatus
     * @param bool $successStatus Summary of successStatus
     * @return self
     */
    protected function setSuccessStatus(bool $successStatus): self
    {
        $this->successStatus = $successStatus;
        return $this;
    }


    /**
     * Summary of setErrorMessage
     * @param string $error
     * @return Service
     */
    protected function setErrorMessage(string $error)
    {
        return $this->setMessage(["message" => $error]);
    }

    /**
     * Summary of setSuccessMessage
     * @param string $success
     * @param string $next
     * @return Service
     */
    protected function setSuccessMessage(string $success, string $next = "", string $handler = null)
    {
        return $this->setMessage(["message" => $success, "next" => $next, "handler" => $handler]);
    }


    /**
     * Summary of displayMessage
     * @return void
     */
    protected function displayMessage()
    {
        echo json_encode($this->getMessage());
    }


    /**
     * Summary of setResponseCode
     * @param int $code
     * @return bool|int
     */
    protected function setResponseCode(int $code)
    {
        return http_response_code($code);
    }

    /**
     * Summary of formatMethod
     * @return void
     */
    private function formatMethod()
    {
        $this->setFormattedMethod(Formatter::run()->formatStringToArray($this->getMethod()));
        return;
    }

    /**
     * Summary of getClass
     * @return string
     */
    private function getClass()
    {
        return Namespaces::getClass($this->getFormattedMethod()["class"]);
    }

    /**
     * Summary of getClassMethod
     * @return mixed
     */
    private function getClassMethod()
    {
        return $this->getFormattedMethod()["method"];
    }

    /**
     * Summary of runMethod
     * @throws Exception
     * @return bool
     */
    private function runMethod()
    {
        $this->formatMethod();
        if (Formatter::verifyClass($this->getClass())) {
            $class = $this->getClass();
            $method = $this->getClassMethod();
            $class = new $class;
            if (Formatter::verifyMethod($class, $method)) {
                if (count($this->getData())) {
                    $class->$method($this->getData());
                } else {
                    $class->$method();
                }
                return true;
            } else {
                throw new Exception("Warning: Property " . $this->getClassMethod() . " was not found in class " . $this->getClass());
            }
        } else {
            throw new Exception("Warning: Class" . $this->getClass() . " was not found");
        }
    }

    /**
     * Summary of commit
     * @return void
     */
    private function commit()
    {
        if ($this->runMethod()) {
            $this->setSuccessStatus(true);
        }
        return;
    }



    private function storeToCache()
    {
        $this->setMethod(parent::getMethod());
        $this->commit();
        return;
    }
    private function completeSetup()
    {
        switch ($this->getNextStep()) {
            case "complete-setup":
                $this->setData(Storage::getFromCache());
                $this->setMethod(parent::getCommitMethod());
                $this->commit();
                return;
        }
    }

    /**
     * Summary of assignToFormService
     * @return void
     */
    private function assignToFormService()
    {
        $this->storeToCache();
        $this->completeSetup();
        return;
    }


    /**
     * Summary of validateFormData
     * @return mixed
     */
    protected function runFormService()
    {
        $validationHandler = new ValidationApi;
        $validationHandler->setData(parent::getGeneratedData());
        $validationHandler->setRules(parent::getRules());
        $validationHandler->setErrorBag(parent::getErrors());
        $validationHandler->runRequest();
        if ($validationHandler->confirm()) {
            $this->processService($validationHandler);
        } else {
            $this->processErrorMessages($validationHandler);
        }
    }



    protected function processService(ValidationApi $validationHandler)
    {
        $this->setNextStep(parent::getNextStep());
        $this->setData([parent::getForm() => $validationHandler->getData()]);
        $this->assignToFormService();
        if ($this->hasSuccess()) {
            $this->setResponseCode(200);
            $this->setSuccessMessage(parent::getSuccessMessage(), parent::getNextStep(), parent::getFormHandler());
            $this->displayMessage();
        } else {
            $this->setErrorMessage(parent::getErrorMessage());
            $this->setResponseCode(404);
        }
    }

    protected function processErrorMessages(ValidationApi $validationHandler)
    {
        $this->setErrorMessage($validationHandler->getErrorMessage());
        $this->setResponseCode(404);
        $this->displayMessage();
        return;
    }

    /**
     * Summary of nextStep
     * @return mixed
     */
    protected function getNextStep()
    {
        return $this->nextStep;
    }

    /**
     * Summary of nextStep
     * @param string $nextStep Summary of nextStep
     * @return self
     */
    protected function setNextStep(string $nextStep): self
    {
        $this->nextStep = $nextStep;
        return $this;
    }



}