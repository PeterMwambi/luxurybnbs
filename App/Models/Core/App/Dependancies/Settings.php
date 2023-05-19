<?php

namespace Models\Core\App\Dependancies;

/**
 * @author Peter Mwambi <calebmwambi@gmail.com>
 * @version miracle v1.2.0
 */

class Settings extends Dependancies
{
    /**
     * Summary of connectToDB
     * @return object
     */
    protected function connectToDB()
    {
        return parent::dependancy("database/database-connection");
    }


    /**
     * Summary of validationRules
     * @param string $fileIdentifiers
     * @return object
     */
    protected function validationRules(string $fileIdentifiers)
    {
        return parent::dependancy("rules/" . $fileIdentifiers);
    }

    /**
     * Summary of validationErrors
     * @param string $fileIdentifiers
     * @return object
     */
    protected function validationErrors(string $fileIdentifiers)
    {
        return parent::dependancy("errors/" . $fileIdentifiers);
    }

    /**
     * Summary of routes
     * @return object
     */
    protected function routes()
    {
        return parent::dependancy("routes/routes");
    }

    /**
     * Summary of routePrefix
     * @return object
     */
    protected function routePrefix()
    {
        return parent::dependancy("routes/route-prefix");
    }

    /**
     * Summary of formRegister
     * @return object
     */
    protected function formRegister()
    {
        return parent::dependancy("forms/register");
    }

    /**
     * Summary of formSettings
     * @return object
     */
    protected function formSettings()
    {
        return parent::dependancy("forms/settings");
    }

    /**
     * Summary of formData
     * @return object
     */
    protected function formData()
    {
        return parent::dependancy("forms/data");
    }

}