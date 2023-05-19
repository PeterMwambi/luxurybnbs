<?php
namespace Models\Core\App\Validation\Kernel;

use Exception;
use Models\Core\App\Database\Queries\Validator\Validate;
use Models\Core\App\Helpers\DateTime;
use Models\Core\App\Helpers\Formatter;
use Models\Core\App\Utilities\File;
use Models\Core\App\Utilities\Url;

/**
 * @author Peter Mwambi <calebmwambi@gmail.com>
 * @content Validation Class
 * @time Wed Dec 30 2020 10:27:13 gMT+0300 (East Africa Time)
 * @updated on Sat Feb 20 2021 17:50:05 gMT+0300 (East Africa Time)
 * 
 * Next Version should make use of http response codes on errors
 */


class Service
{
    /**
     * Summary of errors
     * @var array
     */
    private $errors = array();

    /**
     * Summary of passed
     * @var bool
     */
    private $passed = false;



    /**
     * Summary of data
     * @var string
     */
    private $dataString = "";

    /**
     * Summary of key
     * @var string
     */
    private $key = "";

    /**
     * Summary of keyword
     * @var string
     */
    private $keyword = "";

    /**
     * Summary of keywords
     * @var object
     */
    private $keywords = null;
    /**
     * Summary of dataArray
     * @var array
     */
    private $dataArray = array();

    /**
     * Summary of validateable
     * @var array|string
     */
    private $validateable = null;


    /**
     * Summary of fields
     * @var array
     */
    private $fields = array();

    /**
     * Summary of table
     * @var string
     */
    private $table = "";

    /**
     * Summary of where
     * @var array
     */
    private $where = array();

    /**
     * Summary of sourceData
     * @var array
     */
    private $sourceData = array();


    /**
     * Summary of errorObject
     * @var object
     */
    private $errorObject = null;


    /**
     * Summary of rulesObject
     * @var object
     */
    private $rulesObject = null;

    /**
     * @return mixed
     */
    private function getDataArray()
    {
        return $this->dataArray;
    }

    /**
     * @param array $dataArray 
     * @return self
     */
    protected function setDataArray(array $dataArray): self
    {
        $this->dataArray = $dataArray;
        return $this;
    }

    /**
     * Summary of validateable
     * @return array|string
     */
    private function getValidateable()
    {
        return $this->validateable;
    }

    /**
     * Summary of validateable
     * @param array|string $validateable Summary of validateable
     * @return self
     */
    protected function setValidateable(mixed $validateable): self
    {
        $this->validateable = $validateable;
        return $this;
    }

    /**
     * Summary of data
     * @return string
     */
    private function getDataString()
    {
        if (!empty($this->dataString)) {
            return $this->dataString;
        } else {
            throw new Exception("Warning: Data has not been defined");
        }
    }

    /**
     * Summary of data
     * @param string $dataString Summary of data
     * @return self
     */
    protected function setDataString(string $dataString): self
    {
        $this->dataString = $dataString;
        return $this;
    }

    /**
     * Summary of key
     * @return string
     */
    private function getKey()
    {
        if (!empty($this->key)) {
            return $this->key;
        } else {
            throw new Exception("Warning: Key has not been defined");
        }
    }

    /**
     * Summary of key
     * @param string $key Summary of key
     * @return self
     */
    protected function setKey(string $key): self
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return array
     */
    private function getFields()
    {
        if (count($this->fields)) {
            return $this->fields;
        } else {
            throw new Exception("Warning: Fields have not been defined");
        }
    }

    /**
     * @param mixed $fields 
     * @return self
     */
    protected function setFields(array $fields): self
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * @return string
     */
    private function getTable()
    {
        if (!empty($this->table)) {
            return $this->table;
        } else {
            throw new Exception("Warning: Table has not been defined");
        }
    }

    /**
     * @param mixed $table 
     * @return self
     */
    protected function setTable($table): self
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @return mixed
     */
    private function getWhere()
    {
        if (count($this->where)) {
            return $this->where;
        } else {
            throw new Exception("Warning: Where has not been defined");
        }
    }

    /**
     * @param mixed $where 
     * @return self
     */
    private function setWhere($where): self
    {
        $this->where = $where;
        return $this;
    }

    /**
     * Summary of unsetDataArray
     * @return void
     */
    private function unsetDataArray()
    {
        $this->dataArray = array();
    }

    /**
     * @return mixed
     */
    private function getSourceData()
    {
        if (count($this->sourceData)) {
            return $this->sourceData;
        } else {
            throw new Exception("Warning: Source data has not been defined");
        }
    }

    /**
     * @param mixed $sourceData 
     * @return self
     */
    private function setSourceData($sourceData): self
    {
        $this->sourceData = $sourceData;
        return $this;
    }



    /**
     * Summary of errorObject
     * @return object
     */
    private function getErrorObject()
    {
        if (is_object($this->errorObject)) {
            return $this->errorObject;
        } else {
            throw new Exception("Warning: Error object has not been defined");
        }
    }

    /**
     * Summary of errorObject
     * @param object $errorObject Summary of errorObject
     * @return self
     */
    private function setErrorObject(object $errorObject): self
    {
        $this->errorObject = $errorObject;
        return $this;
    }

    /**
     * Summary of rulesObject
     * @return object
     */
    protected function getRulesObject()
    {
        return $this->rulesObject;
    }

    /**
     * Summary of rulesObject
     * @param object $rulesObject Summary of rulesObject
     * @return self
     */
    protected function setRulesObject($rulesObject): self
    {
        $this->rulesObject = $rulesObject;
        return $this;
    }

    /**
     * @return mixed
     */
    private function getKeyword()
    {
        if (!empty($this->keyword)) {
            return $this->keyword;
        } else {
            throw new Exception("Warning: Keyword has not been defined");
        }
    }

    /**
     * @param string $keyword 
     * @return self
     */
    private function setKeyword(string $keyword): self
    {
        $this->keyword = $keyword;
        return $this;
    }

    /**
     * Summary of keywords
     * @return object
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Summary of keywords
     * @param object $keywords Summary of keywords
     * @return self
     */
    public function setKeywords(object $keywords): self
    {
        $this->keywords = $keywords;
        return $this;
    }

    private function resolvePattern(string $identifier)
    {
        return match ($identifier) {
            "int" => "/^[0-9]*$/",
            "string" => "/^[A-Za-z]*$/",
            "string-with-numbers" => "/^[A-Za-z0-9]*$/",
            "string-with-numbers-and-spaces" => "/^[A-Za-z0-9 ]*$/",
            "string-with-numbers-and-selected-characters" => "/^[A-Za-z0-9@&#.,]*$/",
            "string-with-numbers-selected-characters-and-spaces" => "/^[A-Za-z0-9.,* ]*$/",
        };
    }


    private function getLengthProperty($keywords)
    {
        if (Formatter::verifyProperty($keywords, "length")) {
            return $keywords->length;
        } else {
            return true;
        }
    }
    private function getConstant(string $alias)
    {
        switch ($alias) {
            case "int":
                return FILTER_VALIDATE_INT;
            case "email":
                return FILTER_VALIDATE_EMAIL;
        }
    }

    private function runLengthValidation(bool $keywords = true, string $keyword, string $data, int $value, string $error)
    {
        switch ($keywords) {
            case false:
                switch ($keyword) {
                    case "min":
                        if (!empty($data) && ((int) $data) < $value) {
                            $this->bindError($error);
                            return;
                        }
                        break;
                    case "max":
                        if (!empty($data) && ((int) $data) > $value) {
                            $this->bindError($error);
                            return;
                        }
                        break;
                }
                return;
            default:
                switch ($keyword) {
                    case "min":
                        if (!empty($data) && strlen($data) < $value) {
                            $this->bindError($error);
                            return;
                        }
                        break;
                    case "max":
                        if (!empty($data) && strlen($data) > $value) {
                            $this->bindError($error);
                            return;
                        }
                        break;
                }
                return;
        }
    }

    private function buildData(array $data, bool $exists = false)
    {
        $key = $this->getKey();
        switch ($key) {
            case "phone-number":
                $data[$key] = "+254" . $data[$key];
                $this->setDataString($data[$key]);
                break;
            case "password":
                switch ($exists) {
                    case true:
                        $this->setDataArray(["username" => $data["username"], "password" => $data[$key]]);
                        break;
                }
                break;
            case "national-id":
                $this->setDataString($data[$key]);
                break;
            case "username":
                $this->setDataString($data[$key]);
                break;
            default:
                $this->setDataString($data[$key]);
                break;
        }
        return $this;
    }

    private function generateDataPrimitivesFromObjectIdentifier(object $keywords)
    {
        switch ($this->getKey()) {
            case "password":
                $this->setFields([$keywords->column->search]);
                $this->setWhere([$keywords->column->identifier, $this->getValidateable()]);
                break;
        }
        return $this;
    }

    private function generateDataPrimitivesFromDefaultIdentifiers(object $keywords)
    {
        $this->setFields([$keywords->column]);
        $this->setWhere([$keywords->column, "=", $this->getValidateable()]);
        return $this;
    }

    private function generateSourceData()
    {
        $this->setSourceData([
            "table" => $this->getTable(),
            "fields" => $this->getFields(),
            "where" => $this->getWhere(),
            "fetch" => 0
        ]);
        return $this;
    }

    private function generateDataPrimitives(object $keywords)
    {
        if (is_object($keywords->column)) {
            $this->generateDataPrimitivesFromObjectIdentifier($keywords);
        } else {
            $this->generateDataPrimitivesFromDefaultIdentifiers($keywords);
        }
        $this->generateSourceData();
        return $this;
    }


    private function runUniqueValidation(object $keywords)
    {
        $validate = new Validate;
        if (Formatter::verifyMethod($validate, $keywords->method)) {
            $method = $keywords->method;
            $this->setTable($keywords->table);
            $this->generateDataPrimitives($keywords);
            $errors = $this->getErrorObject();
            $key = $this->getKey();
            $keyword = $this->getKeyword();
            $validate->$method($this->getSourceData());
            switch ($keywords->exists) {
                case false:
                    switch ($validate->hasCount()) {
                        case true:
                            $this->bindError($errors->$key->$keyword);
                            return;
                    }
                    break;
                case true:
                    switch ($validate->hasCount()) {
                        case false:
                            switch ($method) {
                                case "username":
                                    $this->bindError($errors->$key->$keyword);
                                    return;
                                case "password":
                                    switch ($validate->getStatus()) {
                                        case false:
                                            $keyword = $validate->getStatusMessage()["errmsg"];
                                            $this->bindError($errors->$key->$keyword);
                                            return;
                                    }
                                    return;
                            }
                            return;
                    }
                    return;
            }
        }
    }

    private function runDateValidation()
    {
        $keywords = $this->getKeywords();
        $dateTime = new DateTime;
        $dateTime->setDate($this->getDataString());
        $dateTime->setRules(Formatter::formatToArray($keywords->rules));
        if (Formatter::verifyProperty($keywords->rules, "date")) {
            $key = Formatter::formatToArray($keywords->rules->date);
            $dateTime->setDateReference($this->getDataArray()[$key["start-date"]]);
        }
        $dateTime->checkDate();
        $errors = $this->getErrorObject();
        $key = $this->getKey();
        switch ($dateTime->getStatus()) {
            case false;
                $message = $dateTime->getMessage()["errmsg"];
                $this->bindError($errors->$key->$message);
                $this->unsetDataArray();
                return;
            case true;
                $this->unsetDataArray();
        }
    }

    private function runFileValidationAndUpload()
    {
        $key = $this->getKey();
        $keyword = $this->getKeyword();
        $rules = $this->getRulesObject();
        $errors = $this->getErrorObject();
        $file = new File;
        $file->setFileKey($key);
        $file->setUploadDirectory(Url::getPath($rules->$key->uploadDirectory));
        $file->setRules($rules->$key->$keyword);
        $file->write();
        if ($file->confirm()) {
            $file->upload();
            return;
        } else {
            $error = $file->getErrors();
            $this->bindError($errors->$key->$keyword->$error);
            return;
        }
    }

    private function bindError(string $error)
    {
        $this->errors[] = $error;
    }

    public function confirm()
    {
        if (empty($this->errors)) {
            $this->passed = true;
        }
        return $this->passed;
    }

    public function getErrorMessage()
    {
        if (count($this->errors)) {
            foreach ($this->errors as $error) {
                return $error;
            }
        }
        return;
    }
    protected function execute(array $data, object $rules, object $errors)
    {
        foreach ($rules as $key => $keywords) {
            foreach ($keywords as $keyword => $value) {
                switch ($keyword) {
                    case "required":
                        switch ($value) {
                            case true:
                                if (empty($data[$key])) {
                                    $this->bindError($errors->$key->$keyword);
                                    return;
                                }
                                break;
                            case false:
                                if (isset($keywords->any)) {
                                    if (count($keywords->any)) {
                                        $items = $keywords->any;
                                        $test = false;
                                        foreach ($items as $item) {
                                            if (!empty($data[$item])) {
                                                $test = true;
                                            }
                                        }
                                        if (!$test) {
                                            $this->bindError($errors->$key->any);
                                            return;
                                        }
                                    }
                                } else {
                                    if (empty($data[$key])) {
                                        return;
                                    }
                                }
                                break;
                        }
                        break;
                    case "matches":
                        if (!empty($data[$key]) && $data[$key] !== $data[$value]) {
                            $this->bindError($errors->$key->$keyword);
                            return;
                        }
                        break;
                    case "min":
                        $this->runLengthValidation($this->getLengthProperty($keywords), $keyword, $data[$key], $value, $errors->$key->$keyword);
                        break;
                    case "max":
                        $this->runLengthValidation($this->getLengthProperty($keywords), $keyword, $data[$key], $value, $errors->$key->$keyword);
                        break;
                    case "pattern":
                        if (!empty($data[$key]) && !preg_match($this->resolvePattern($value), $data[$key])) {
                            $this->bindError($errors->$key->$keyword);
                            return;
                        }
                        break;
                    case "constant":
                        if (!empty($data[$key]) && !filter_var($data[$key], $this->getConstant($value))) {
                            $this->bindError($errors->$key->$keyword);
                            return;
                        }
                        break;
                    case "values":
                        if (!empty($data[$key]) && !in_array($data[$key], $value)) {
                            $this->bindError($errors->$key->$keyword);
                            return;
                        }
                        break;
                    case "different":
                        foreach ($value as $item) {
                            if ($data[$key] === $data[$item]) {
                                $this->bindError(ucfirst(str_replace("-", " ", $key)) . " cannot be the same as " . str_replace("-", " ", $item));
                                return;
                            }
                        }
                        break;
                    case "type":
                        switch ($value) {
                            case "date":
                                $this->setErrorObject($errors);
                                $this->setKey($key);
                                $this->setDataString($data[$key]);
                                $this->setDataArray($data);
                                $this->setKeywords($keywords);
                                $this->runDateValidation();
                                break;
                        }
                        break;
                    case "unique":
                        $this->setKey($key);
                        $this->buildData($data, isset($keywords->exists) ? $keywords->exists : false);
                        $this->setValidateable(count($this->getDataArray()) ? $this->getDataArray() : $this->getDataString());
                        $this->setErrorObject($errors);
                        $this->setKeyword($keyword);
                        $this->runUniqueValidation($keywords);
                        break;
                    case "file":
                        $this->setKey($key);
                        $this->setRulesObject($rules);
                        $this->setKeyword($keyword);
                        $this->setErrorObject($errors);
                        $this->runFileValidationAndUpload();
                        break;
                }
            }
        }
        return $this;
    }


}