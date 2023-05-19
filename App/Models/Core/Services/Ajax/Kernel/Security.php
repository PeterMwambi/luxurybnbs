<?php

namespace Models\Core\Services\Ajax\Kernel;

use Controllers\Controller;
use Exception;
use Models\Auth\Hashing;

class Security extends Controller
{

    /**
     * Summary of formIdentifier
     * @var string
     */
    private $formIdentifier;


    /**
     * Summary of formIdentifier
     * @return string
     */
    private function getFormIdentifier()
    {
        if (!empty($this->formIdentifier)) {
            return $this->formIdentifier;
        } else {
            throw new Exception("Warning: Form identifier has not been defined");
        }
    }

    /**
     * Summary of formIdentifier
     * @param string $formIdentifier Summary of formIdentifier
     * @return self
     */
    private function setFormIdentifier(string $formIdentifier): self
    {
        $this->formIdentifier = $formIdentifier;
        return $this;
    }


    /**
     * Summary of decryptFormIdentifer
     * @return Security
     */
    private function decryptFormIdentifer()
    {
        $this->setFormIdentifier(Hashing::decrypt($this->getFormIdentifier()));
        return $this;
    }


    /**
     * Summary of verifyFormIdentifier
     * @return bool
     */
    private function verifyFormIdentifier()
    {
        parent::setFormRegister();
        $this->decryptFormIdentifer();
        if (property_exists(parent::getFormRegister(), $this->getFormIdentifier())) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Summary of getFormFromIdentifier
     * @return mixed
     */
    private function getFormFromIdentifier()
    {
        $formRegister = parent::getFormRegister();
        $formIdentifier = $this->getFormIdentifier();
        return $formRegister->$formIdentifier;
    }

    /**
     * Summary of runService
     * @param string $identifier
     * @throws Exception
     * @return bool
     */
    protected function runSecurityService(string $identifier)
    {
        $this->setFormIdentifier($identifier);
        if ($this->verifyFormIdentifier()) {
            parent::setForm($this->getFormFromIdentifier());
            return true;
        } else {
            throw new Exception("Warning: Invalid identifier");
        }

    }

}