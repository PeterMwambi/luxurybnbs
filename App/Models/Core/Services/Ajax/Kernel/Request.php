<?php

namespace Models\Core\Services\Ajax\Kernel;

use Exception;
use Models\Core\App\Validation\Shell\Api as ValidationApi;

class Request extends Security
{

    /**
     * Summary of getFormSettings
     * @return object
     */
    protected function getFormSettings()
    {
        parent::setFormSettings();
        return parent::getFormSettings();
    }

    /**
     * Summary of getFormData
     * @return object
     */
    protected function getFormData()
    {
        parent::setFormData();
        return parent::getFormData();
    }

}