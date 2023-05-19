<?php


namespace Models\Core\Services\Ajax\Shell\Data;

use Exception;
use Models\Auth\Input;
use Models\Auth\Sanitize;
use Models\Core\App\Helpers\Formatter;
use Models\Core\Services\Ajax\Kernel\Request;

class Data extends Request
{
    private $generatedData = array();

    /**
     * @return array
     */
    protected function getGeneratedData()
    {
        if (count($this->generatedData)) {
            return $this->generatedData;
        } else {
            throw new Exception("Warning: No data has been generated");
        }
    }

    /**
     * @param array $generatedData 
     * @return self
     */
    private function setGeneratedData(array $generatedData): self
    {
        $this->generatedData = $generatedData;
        return $this;
    }

    /**
     * Summary of generateFormData
     * @return Data
     */
    protected function generateFormData()
    {
        $form = parent::getForm();
        $datakeys = array();
        foreach (parent::getFormData()->$form as $item) {
            $data = match ($item) {
                "email" => Sanitize::Email(Input::Get($item)),
                default => Sanitize::String(Input::Get($item)),
            };
            array_push($datakeys, $item);
            array_push($this->generatedData, $data);
        }
        $this->generatedData = Formatter::Run()->FormatArray($this->generatedData, $datakeys);
        $this->setGeneratedData($this->generatedData);
        return $this;
    }
    /**
     * Summary of getFormSettings
     * @return object
     */
    protected function getFormSettings()
    {
        $form = parent::getForm();
        parent::setFormSettings();
        return parent::getFormSettings()->$form;
    }
}