<?php

namespace Models\Core\App\Utilities;

use Exception;
use Models\Auth\Sanitize;

/**
 * @author Peter Mwambi
 * @content File Upload class
 * @date Mon May 24 2021 01:10:58 GMT+0300 (East Africa Time)
 * @updated Sat Jan 15 2022 22:02:51 GMT+0300 (East Africa Time)
 * 
 * Validate and upload files 
 */

class File
{

    /**
     * Summary of fileKey
     * @var string
     */
    private $fileKey = "";
    /**
     * Summary of FileName
     * @var string
     */
    private $fileName = "";


    /**
     * Summary of tmpFileName
     * @var string
     */
    private $tmpFileName = "";

    /**
     * Summary of fileSize
     * @var int
     */
    private $fileSize = 0;

    /**
     * Summary of fileType
     * @var string
     */
    private $fileType = "";

    /**
     * Summary of fileUploadPath
     * @var string
     */
    private $fileUploadPath = "";

    /**
     * Summary of uploadDirectory
     * @var string
     */
    private $uploadDirectory = "";


    /**
     * Summary of status
     * @var bool
     */
    private $status = false;
    /**
     * Summary of message
     * @var array
     */
    private $message = array();

    /**
     * @var object $rules
     * 
     * The file validation rules
     */

    private $rules = null;



    /**
     * Summary of fileKey
     * @return string
     */
    protected function getFileKey()
    {
        if (!empty($this->fileKey)) {
            return $this->fileKey;
        } else {
            throw new Exception("Warning: File key has not been defined");
        }
    }

    /**
     * Summary of fileKey
     * @param string $fileKey Summary of fileKey
     * @return self
     */
    public function setFileKey(string $fileKey): self
    {
        $this->fileKey = $fileKey;
        return $this;
    }

    /**
     * Summary of FileName
     * @return string
     */
    public function getFileName()
    {
        if (!empty($this->fileName)) {
            return $this->fileName;
        } else {
            throw new Exception("Warning: File name has not been defined");
        }
    }

    /**
     * Summary of FileName
     * @param string $fileName Summary of FileName
     * @return self
     */
    public function setFileName(string $fileName): self
    {
        $this->fileName = $fileName;
        return $this;
    }

    /**
     * Summary of tmpFileName
     * @return string
     */
    protected function getTmpFileName()
    {
        if (!empty($this->tmpFileName)) {
            return $this->tmpFileName;
        } else {
            throw new Exception("Warning: Temporary file name has not been defined");
        }
    }

    /**
     * Summary of tmpFileName
     * @param string $tmpFileName Summary of tmpFileName
     * @return self
     */
    public function setTmpFileName(string $tmpFileName): self
    {
        $this->tmpFileName = $tmpFileName;
        return $this;
    }

    /**
     * Summary of fileSize
     * @return int
     */
    protected function getFileSize()
    {
        if (!empty($this->fileSize)) {
            return $this->fileSize;
        } else {
            throw new Exception("Warning: File size has not been defined");
        }
    }

    /**
     * Summary of fileSize
     * @param int $fileSize Summary of fileSize
     * @return self
     */
    public function setFileSize(int $fileSize): self
    {
        $this->fileSize = $fileSize;
        return $this;
    }

    /**
     * Summary of fileType
     * @return string
     */
    protected function getFileType()
    {
        if (!empty($this->fileType)) {
            return $this->fileType;
        } else {
            throw new Exception("Warning: File type has not been defined");
        }
    }

    /**
     * Summary of fileType
     * @param string $fileType Summary of fileType
     * @return self
     */
    public function setfileType(string $fileType): self
    {
        $this->fileType = $fileType;
        return $this;
    }

    /**
     * Summary of fileUploadPath
     * @return string
     */
    protected function getFileUploadPath()
    {
        if (!empty($this->fileUploadPath)) {
            return $this->fileUploadPath;
        } else {
            throw new Exception("Warning: File upload path has not been defined");
        }
    }

    /**
     * Summary of fileUploadPath
     * @param string $fileUploadPath Summary of fileUploadPath
     * @return self
     */
    public function setFileUploadPath(string $fileUploadPath): self
    {
        $this->fileUploadPath = $fileUploadPath;
        return $this;
    }

    /**
     * Summary of uploadDirectory
     * @return string
     */
    public function getUploadDirectory()
    {
        if (!empty($this->uploadDirectory)) {
            return $this->uploadDirectory;
        } else {
            throw new Exception('Warning: Upload directory has not bee defined');
        }
    }

    /**
     * Summary of uploadDirectory
     * @param string $uploadDirectory Summary of uploadDirectory
     * @return self
     */
    public function setUploadDirectory(string $uploadDirectory): self
    {
        $this->uploadDirectory = $uploadDirectory;
        return $this;
    }

    /**
     * Summary of message
     * @return array
     */
    protected function getmessage()
    {
        return $this->message;
    }

    /**
     * Summary of message
     * @param array $message Summary of message
     * @return self
     */
    public function setmessage(array $message): self
    {
        $this->message = $message;
        return $this;
    }

    /**
     * 
     * @return object
     */
    protected function getRules()
    {
        if (is_object($this->rules)) {
            return $this->rules;
        } else {
            throw new Exception("Warning: Rules have not been defined");
        }
    }

    /**
     * 
     * @param object $rules 
     * @return self
     */
    public function setRules(object $rules): self
    {
        $this->rules = $rules;
        return $this;
    }

    /**
     * Summary of status
     * @return bool
     */
    public function status()
    {
        return $this->status;
    }

    /**
     * Summary of status
     * @param bool $status Summary of status
     * @return self
     */
    protected function setStatus($status): self
    {
        $this->status = $status;
        return $this;
    }



    public function write()
    {
        if ($this->processWrite()) {
            return true;
        }
        return false;
    }

    private function processWrite()
    {
        $this->setFileName(Sanitize::string($_FILES[$this->getFileKey()]["name"]));
        $this->setTmpFileName(Sanitize::string($_FILES[$this->getFileKey()]["tmp_name"]));
        $this->setFileSize(Sanitize::string($_FILES[$this->getFileKey()]["size"]));
        $this->setFileUploadPath($this->getUploadDirectory() . basename($this->getFileName()));
        $this->setFileType(strtolower(pathinfo($this->getFileUploadPath(), PATHINFO_EXTENSION)));
        $this->validate();
        return $this;
    }


    private function validate()
    {
        foreach ($this->getRules() as $key => $value) {
            switch ($key) {
                case "required":
                    switch ($value) {
                        case true:
                            if (empty($this->getFileName())) {
                                $this->message($key);
                                return;
                            }
                    }
                    break;
                case "exists":
                    switch ($value) {
                        case true:
                            if (file_exists($this->getFileUploadPath())) {
                                $this->message($key);
                                return;
                            }
                            break;
                    }
                    break;
                case "allowedTypes":
                    if (!in_array($this->getFileType(), $value)) {
                        $this->message($key);
                        return;
                    }
                    break;
                case "max":
                    if ($this->getFileSize() > $value) {
                        $this->message($key);
                        return;
                    }
                    break;
            }
        }
    }
    private function message($message)
    {
        array_push($this->message, $message);
    }

    /**
     * @param null
     * @return null|string
     * 
     * Process Validation message
     */

    public function getErrors()
    {
        if (count($this->message)) {
            foreach ($this->message as $message) {
                return $message;
            }
        }
        return;
    }

    /**
     * @param null
     * @return bool
     * 
     * Confirms if validation has succeded. Returns true 
     * if validation has passed otherwise false
     */

    public function confirm()
    {
        if (empty($this->message)) {
            return true;
        }
        return false;
    }

    public function upload()
    {
        if ($this->processUpload()) {
            return true;
        }
        return false;
    }

    private function processUpload()
    {
        if ($this->confirm()) {
            if (move_uploaded_file($this->getTmpFileName(), $this->getFileUploadPath())) {
                return true;
            }
            return false;
        }
    }

}