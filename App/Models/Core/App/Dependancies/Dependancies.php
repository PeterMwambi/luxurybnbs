<?php


namespace Models\Core\App\Dependancies;

use Exception;
use Models\Core\App\Helpers\Formatter;

/**
 * @author Peter Mwambi <calebmwambi@gmail.com>
 * @version miracle v1.2.0
 */
class Dependancies extends Json
{
    /**
     * Summary of fileName
     * @var mixed
     */
    private $fileName = null;
    /**
     * Summary of fileFormattingKeys
     * @var array
     */
    private $fileFormattingKeys = array();
    /**
     * Summary of jsonData
     * @var mixed
     */

    /**
     * Summary of dependancies
     * @var mixed
     */
    private $dependancies = null;

    /**
     * Summary of directory
     * @var mixed
     */
    private $directory = "";

    /**
     * Summary of subDirectory
     * @var mixed
     */
    private $subDirectory = "";

    /**
     * Summary of filePathIdentifier
     * @var mixed
     */
    private $filePathIdentifier = "";

    /**
     * Summary of fileNameArrayCounter
     * @var mixed
     */
    private $fileNameArrayCounter = 0;


    /**
     * Summary of register
     * @param object $dependancies
     * @return Dependancies
     */
    protected function register(object $dependancies)
    {
        $this->dependancies = $dependancies;
        return $this;
    }

    /**
     * Summary of getDependancies
     * @throws Exception
     * @return object
     */
    private function getDependancies()
    {
        if (is_object($this->dependancies)) {
            return $this->dependancies;
        } else {
            throw new Exception("Warning: Dependancies have not been initialised");
        }
    }

    /**
     * Summary of getFileName
     * @throws Exception
     * @return mixed
     */
    private function getFileName()
    {
        if (!empty($this->fileName)) {
            return $this->fileName;
        } else {
            throw new Exception("Warning: File name hase not been initialised");
        }
    }

    /**
     * Summary of setFileName
     * @param mixed $fileName
     * @return Dependancies
     */
    protected function setFileName(mixed $fileName): self
    {
        $this->fileName = $fileName;
        return $this;
    }

    /**
     * Summary of fileFormattingKeys
     * @return array
     */
    private function getFileFormattingKeys()
    {
        if (count($this->fileFormattingKeys)) {
            return $this->fileFormattingKeys;
        } else {
            throw new Exception("Warning: File name formatter keys have not been defined");
        }
    }

    /**
     * Summary of fileFormattingKeys
     * @param array $fileFormattingKeys Summary of fileFormattingKeys
     * @return self
     */
    public function setFileFormattingKeys(array $fileFormattingKeys): self
    {
        $this->fileFormattingKeys = $fileFormattingKeys;
        return $this;
    }

    /**
     * Summary of getDirectory
     * @throws Exception
     * @return string
     */
    private function getDirectory()
    {
        if (!empty($this->directory)) {
            return $this->directory;
        } else {
            throw new Exception("Warning: Dependancy directory has not been defined");
        }
    }

    /**
     * Summary of setDirectory
     * @param string $directory
     * @return Dependancies
     */
    protected function setDirectory(string $directory): self
    {
        $this->directory = $directory;
        return $this;
    }

    /**
     * Summary of getSubDirectory
     * @throws Exception
     * @return string
     */
    private function getSubDirectory()
    {
        if (!empty($this->subDirectory)) {
            return $this->subDirectory;
        } else {
            throw new Exception("Warning: Dependancy sub directory has not been defined");
        }
    }

    /**
     * Summary of setSubDirectory
     * @param string $subDirectory
     * @return Dependancies
     */
    protected function setSubDirectory(string $subDirectory): self
    {
        $this->subDirectory = $subDirectory;
        return $this;
    }

    /**
     * Summary of getFilePathIdentifier
     * @throws Exception
     * @return string
     */
    private function getFilePathIdentifier()
    {
        if (!empty($this->filePathIdentifier)) {
            return $this->filePathIdentifier;
        } else {
            throw new Exception("Warning: Dependancy file path identifier has not been defined");
        }
    }

    /**
     * Summary of setFilePathIdentifier
     * @param string $filePathIdentifier
     * @return Dependancies
     */
    protected function setFilePathIdentifier(string $filePathIdentifier): self
    {
        $this->filePathIdentifier = $filePathIdentifier;
        return $this;
    }

    /**
     * Summary of getFileNameArrayCounter
     * @throws Exception
     * @return int
     */
    private function getFileNameArrayCounter()
    {
        if ($this->fileNameArrayCounter > 0) {
            return $this->fileNameArrayCounter;
        } else {
            throw new Exception("Warning: File name array counter has not been defined");
        }
    }

    /**
     * Summary of setFileNameArrayCounter
     * @param int $fileNameArrayCounter
     * @return Dependancies
     */
    protected function setFileNameArrayCounter(int $fileNameArrayCounter): self
    {
        $this->fileNameArrayCounter = $fileNameArrayCounter;
        return $this;
    }


    /**
     * Summary of getDependanciesFromJson
     * @return void
     */
    private function getDependanciesFromJson()
    {
        parent::setFilePath("app/config/dependancies/config.json");
        parent::writeJsonDataFromConfigFile();
        $this->register(parent::getJsonData());
        return;
    }


    /**
     * Summary of explodeFileName
     * @param string $filename
     * @return array<string>|bool
     */
    private function explodeFileName(string $filename)
    {
        return explode("/", $filename);
    }


    /**
     * Summary of formatFileNameToArray
     * @return Dependancies
     */
    protected function formatFileNameToArray()
    {
        $this->setFileName(Formatter::run()->formatStringToArray($this->getFileName(), $this->getFileFormattingKeys()));
        return $this;
    }


    /**
     * Summary of processFileName
     * @return Dependancies
     */
    protected function processFileName()
    {
        $this->setFileNameArrayParams();
        return $this;
    }


    /**
     * Summary of setFileNameArrayParams
     * @throws Exception
     * @return Dependancies
     */
    private function setFileNameArrayParams()
    {
        $this->setFileNameArrayCounter(count($this->explodeFileName($this->getFileName())));
        switch ($this->getFileNameArrayCounter()) {
            case 1:
                $this->setFileFormattingKeys(["file-path-identifier"]);
                $this->formatFileNameToArray();
                $this->setFilePathIdentifier($this->getFileName()["file-path-identifier"]);
                return $this;
            case 2:
                $this->setFileFormattingKeys(["directory", "file-path-identifier"]);
                $this->formatFileNameToArray();
                $this->setDirectory($this->getFileName()["directory"]);
                $this->setFilePathIdentifier($this->getFileName()["file-path-identifier"]);
                return $this;
            case 3:
                $this->setFileFormattingKeys(["directory", "sub-directory", "file-path-identifier"]);
                $this->formatFileNameToArray();
                $this->setDirectory($this->getFileName()["directory"]);
                $this->setSubDirectory($this->getFileName()["sub-directory"]);
                $this->setFilePathIdentifier($this->getFileName()["file-path-identifier"]);
                return $this;
            default:
                throw new Exception("Warning: Invalid item count");
        }
    }


    /**
     * Summary of processFilePath
     * @throws Exception
     * @return Dependancies
     */
    private function processFilePath()
    {
        $this->getDependanciesFromJson();
        $this->processFileName();
        $this->setFileNameArrayCounter(count($this->getFileName()));
        switch ($this->getFileNameArrayCounter()) {
            case 1:
                $filePathIdentifier = $this->getFilePathIdentifier();
                parent::setFilePath($this->getDependancies()->$filePathIdentifier);
                return $this;
            case 2:
                $directory = $this->getDirectory();
                $filePathIdentifier = $this->getFilePathIdentifier();
                parent::setFilePath($this->getDependancies()->$directory->$filePathIdentifier);
                return $this;
            case 3:
                $directory = $this->getDirectory();
                $subDirectory = $this->getSubDirectory();
                $filePathIdentifier = $this->getFilePathIdentifier();
                parent::setFilePath($this->getDependancies()->$directory->$subDirectory->$filePathIdentifier);
                return $this;
            default:
                throw new Exception("Warning: Invalid path");
        }
    }


    /**
     * Summary of getJsonData
     * @return object
     */
    protected function getJsonData()
    {
        $this->processFilePath();
        $this->writeJsonDataFromConfigFile();
        return parent::getJsonData();
    }


    /**
     * Summary of dependancy
     * @param mixed $filename
     * @return object
     */
    protected function dependancy(string $filename)
    {
        $this->setFileName($filename);
        return $this->getJsonData();
    }

}