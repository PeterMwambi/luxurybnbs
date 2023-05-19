<?php

namespace Controllers;

use Exception;
use Models\Core\App\Dependancies\Settings;
use Models\Core\App\Validation\Shell\Api as ValidationApi;

class Controller extends Settings
{

    /**
     * Summary of databaseConnection
     * @var mixed
     */
    private $databaseConnection = null;

    /**
     * Summary of data
     * @var mixed
     */
    private $data = null;

    /**
     * Summary of form
     * @var mixed
     */
    private $form = null;

    /**
     * Summary of errors
     * @var mixed
     */
    private $errors = null;

    /**
     * Summary of rules
     * @var mixed
     */
    private $rules = null;

    /**
     * Summary of key
     * @var mixed
     */
    private $key = null;

    /**
     * Summary of formRegister
     * @var mixed
     */
    private $formRegister = null;
    /**
     * Summary of formSettings
     * @var mixed
     */
    private $formSettings = null;

    /**
     * Summary of value
     * @var mixed
     */
    private $value = null;

    /**
     * Summary of routes
     * @var mixed
     */
    private $routes = null;

    /**
     * Summary of routePrefix
     * @var mixed
     */
    private $routePrefix = null;

    /**
     * Summary of databaseConnection
     * @return mixed
     */
    public function getDatabaseConnection()
    {
        if (is_object($this->databaseConnection)) {
            return $this->databaseConnection;
        } else {
            throw new Exception("Warning: Database connection settings have not been defined");
        }
    }

    /**
     * Summary of databaseConnection
     * @param mixed $databaseConnection Summary of databaseConnection
     * @return self
     */
    public function setDatabaseConnection(): self
    {
        $this->databaseConnection = parent::connectToDB();
        return $this;
    }

    /**
     * Summary of setRoutes
     * @return Controller
     */
    protected function setRoutes()
    {
        $this->routes = parent::routes();
        return $this;
    }

    /**
     * Summary of getRoutes
     * @throws Exception
     * @return object
     */
    protected function getRoutes()
    {
        if (is_object($this->routes)) {
            return $this->routes;
        } else {
            throw new Exception("Warning: Routes have not been initialilsed");
        }
    }

    /**
     * Summary of setRoutePrefix
     * @return Controller
     */
    protected function setRoutePrefix()
    {
        $this->routePrefix = parent::routePrefix();
        return $this;
    }

    /**
     * Summary of getRoutePrefix
     * @throws Exception
     * @return object
     */
    protected function getRoutePrefix()
    {
        if (is_object($this->routePrefix)) {
            return $this->routePrefix;
        } else {
            throw new Exception("Warning: Route prefix has not been defined");
        }
    }

    /**
     * Summary of setForm
     * @param mixed $form
     * @return Controller
     */
    protected function setForm(string $form)
    {
        $this->form = $form;
        return $this;
    }

    /**
     * Summary of getForm
     * @throws Exception
     * @return string
     */
    protected function getForm()
    {
        if (!empty($this->form)) {
            return $this->form;
        } else {
            throw new Exception("Warning: Form has not been initialized");
        }
    }

    /**
     * Summary of setRules
     * @param string $fileIdentifiers
     * @return Controller
     */
    protected function setRules(string $fileIdentifiers)
    {
        $this->rules = parent::validationRules($fileIdentifiers);
        return $this;
    }

    /**
     * Summary of getRules
     * @throws Exception
     * @return object
     */
    protected function getRules()
    {
        if (is_object($this->rules)) {
            return $this->rules;
        } else {
            throw new Exception("Warning: Rules have not been initialized");
        }
    }

    /**
     * Summary of setFormData
     * @return Controller
     */
    protected function setFormData()
    {
        $this->data = parent::formData();
        return $this;
    }

    /**
     * Summary of getFormData
     * @throws Exception
     * @return object
     */
    protected function getFormData()
    {
        if (is_object($this->data)) {
            return $this->data;
        } else {
            throw new Exception("Warning: Form data has not been initialised");
        }
    }

    /**
     * Summary of setErrors
     * @param string $fileIdentifiers
     * @return Controller
     */
    protected function setErrors(string $fileIdentifiers)
    {
        $this->errors = parent::validationErrors($fileIdentifiers);
        return $this;
    }

    /**
     * Summary of getErrors
     * @throws Exception
     * @return object
     */
    protected function getErrors()
    {
        if (is_object($this->errors)) {
            return $this->errors;
        } else {
            throw new Exception("Warning: Errors have not been initialised");
        }
    }

    /**
     * Summary of setFormRegister
     * @return Controller
     */
    protected function setFormRegister()
    {
        $this->formRegister = parent::formRegister();
        return $this;
    }

    /**
     * Summary of getFormRegister
     * @throws Exception
     * @return object
     */
    protected function getFormRegister()
    {
        if (is_object($this->formRegister)) {
            return $this->formRegister;
        } else {
            throw new Exception("Warning: Form keys have not been defined");
        }

    }

    /**
     * Summary of setKey
     * @param string $key
     * @return Controller
     */
    protected function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * Summary of getKey
     * @throws Exception
     * @return string
     */
    protected function getKey()
    {
        if (!empty($this->key)) {
            return $this->key;
        } else {
            throw new Exception("Warning: Form key has not been initialized");
        }
    }

    /**
     * Summary of setValue
     * @param string $value
     * @return Controller
     */
    protected function setValue(string $value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Summary of getValue
     * @throws Exception
     * @return string
     */
    protected function getValue()
    {
        if (!empty($this->value)) {
            return $this->value;
        } else {
            throw new Exception("Warning: Form value has not been initialized");
        }
    }

    /**
     * Summary of getFormSettings
     * @throws Exception
     * @return object
     */
    protected function getFormSettings()
    {
        if (is_object($this->formSettings)) {
            return $this->formSettings;
        } else {
            throw new Exception("Warning: Form settings have not been defined");
        }
    }

    /**
     * Summary of setFormSettings
     * @return Controller
     */
    protected function setFormSettings(): self
    {
        $this->formSettings = parent::formSettings();
        return $this;
    }


}