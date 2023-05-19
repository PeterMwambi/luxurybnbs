<?php


namespace Models\Core\App\Dependancies;

use Exception;
use Models\Core\App\Utilities\Url;

/**
 * @author Peter Mwambi <calebmwambi@gmail.com>
 * @version miracle v1.2.0
 */
class Json
{
    /**
     * Summary of jsonData
     * @var mixed
     */
    private $jsonData = null;

    /**
     * Summary of filePath
     * @var mixed
     */
    private $filePath = "";

    /**
     * Summary of getFilePath
     * @throws Exception
     * @return string
     */
    private function getFilePath()
    {
        if (!empty($this->filePath)) {
            return $this->filePath;
        } else {
            throw new Exception("Warning: File path has not been initialised");
        }
    }

    /**
     * Summary of setFilePath
     * @param string $filePath
     * @return Dependancies
     */
    protected function setFilePath(string $filePath): self
    {
        $this->filePath = $filePath;
        return $this;
    }


    /**
     * Summary of getJsonData
     * @throws Exception
     * @return object
     */
    protected function getJsonData()
    {
        if (is_object($this->jsonData)) {
            return $this->jsonData;
        } else {
            throw new Exception("Warning: JSON data has not been initialised");
        }
    }

    /**
     * Summary of setJsonData
     * @param object $jsonData
     * @return Dependancies
     */
    private function setJsonData(object $jsonData): self
    {
        $this->jsonData = $jsonData;
        return $this;
    }


    /**
     * Summary of writeJsonDataFromConfigFile
     * @throws Exception
     * @return void
     */
    protected function writeJsonDataFromConfigFile()
    {
        if (file_exists(Url::getPath($this->getFilePath()))) {
            $this->setJsonData(json_decode(file_get_contents(Url::getPath($this->getFilePath()))));
        } else {
            throw new Exception("Warning: File path was not found");
        }
    }


}