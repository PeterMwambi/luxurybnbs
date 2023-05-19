<?php

namespace Models\Core\Services\Ajax\Shell\Data;

use Exception;
use Models\Core\App\Helpers\Formatter;

class DataSettings extends Data
{



    /**
     * Summary of property
     * @var string
     */
    private $property = "";

    /**
     * Summary of case
     * @var string
     */
    private $case = "";


    /**
     * Summary of property
     * @return string
     */
    public function getProperty()
    {
        if (!empty($this->property)) {
            return $this->property;
        } else {
            throw new Exception("Warning: Property has not been defined");
        }
    }

    /**
     * Summary of setProperty
     * @param string $property
     * @return self
     */
    public function setProperty(string $property): self
    {
        $this->property = $property;
        return $this;
    }

    /**
     * Summary of case
     * @return string
     */
    public function getCase()
    {
        return $this->case;
    }

    /**
     * Summary of case
     * @param string $case Summary of case
     * @return self
     */
    public function setCase(string $case): self
    {
        $this->case = $case;
        return $this;
    }

    /**
     * Summary of getGeneratedData
     * @return array
     */
    protected function getGeneratedData()
    {
        parent::generateFormData();
        return parent::getGeneratedData();
    }

    /**
     * Summary of getFormSettings
     * @return object
     */
    protected function getFormSettings()
    {
        return parent::getFormSettings();
    }

    /**
     * Summary of checkProperty
     * @param object $object
     * @return bool
     */
    private function checkProperty(object $object)
    {
        return Formatter::verifyProperty($object, $this->getProperty());
    }

    /**
     * Summary of runSetup
     * @throws Exception
     * @return mixed
     */
    private function runSetup()
    {
        if ($this->checkProperty($this->getFormSettings())) {
            $property = $this->getProperty();
            switch ($this->getCase()) {
                case "rules":
                    parent::setRules($this->getFormSettings()->$property);
                    return parent::getRules();
                case "errors":
                    parent::setErrors($this->getFormSettings()->$property);
                    return parent::getErrors();
            }
        } else {
            return;
        }
    }

    /**
     * Summary of getRules
     * @return object
     */
    protected function getRules()
    {
        $this->setProperty("rules");
        $this->setCase("rules");
        return $this->runSetup();
    }

    /**
     * Summary of getErrors
     * @return object
     */
    protected function getErrors()
    {
        $this->setProperty("errors");
        $this->setCase("errors");
        return $this->runSetup();
    }

    /**
     * Summary of getMethod
     * @return string|void
     */
    protected function getMethod()
    {
        if (Formatter::verifyProperty($this->getFormSettings(), "method")) {
            return $this->getFormSettings()->method;
        } else {
            return;
        }
    }

    /**
     * Summary of getSuccessMessage
     * @return string|void
     */
    protected function getSuccessMessage()
    {
        if (Formatter::verifyProperty($this->getFormSettings(), "successmessage")) {
            return $this->getFormSettings()->successmessage;
        } else {
            return;
        }
    }
    /**
     * Summary of getErrorMessage
     * @return string|void
     */
    protected function getErrorMessage()
    {
        if (Formatter::verifyProperty($this->getFormSettings(), "errormessage")) {
            return $this->getFormSettings()->errormessage;
        } else {
            return;
        }
    }

    /**
     * Summary of getNextStep
     * @return string|void
     */
    protected function getNextStep()
    {
        if (Formatter::verifyProperty($this->getFormSettings(), "nextstep")) {
            return $this->getFormSettings()->nextstep;
        } else {
            return;
        }
    }

    protected function getCommitMethod()
    {
        if (Formatter::verifyProperty($this->getFormSettings(), "commit")) {
            return $this->getFormSettings()->commit;
        } else {
            return;
        }
    }


    protected function getFormHandler()
    {
        if (Formatter::verifyProperty($this->getFormSettings(), "handler")) {
            return $this->getFormSettings()->handler;
        } else {
            return;
        }
    }
}