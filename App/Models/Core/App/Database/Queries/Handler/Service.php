<?php

namespace Models\Core\App\Database\Queries\Handler;

use Exception;

class Service extends Writer
{



    /**
     * Summary of sourceData
     * @var array
     */
    private $sourceData = array();

    /**
     * Summary of sourceKeys
     * @var array
     */
    private $sourceKeys = array();



    /**
     * Summary of sourceData
     * @return array
     */
    public function getSourceData()
    {
        if (count($this->sourceData)) {
            return $this->sourceData;
        } else {
            throw new Exception("Warning: Source data has not been defined");
        }
    }

    /**
     * Summary of sourceData
     * @param array $sourceData Summary of sourceData
     * @return self
     */
    protected function setSourceData(array $sourceData): self
    {
        $this->sourceData = $sourceData;
        return $this;
    }



    /**
     * Summary of sourceKeys
     * @return array
     */
    protected function getSourceKeys()
    {
        if (count($this->sourceKeys)) {
            return $this->sourceKeys;
        } else {
            throw new Exception("Warning: Source keys have not been defined");
        }
    }

    /**
     * Summary of sourceKeys
     * @param array $sourceKeys Summary of sourceKeys
     * @return self
     */
    protected function setSourceKeys(array $sourceKeys): self
    {
        $this->sourceKeys = $sourceKeys;
        return $this;
    }

    private function verifySourceKeys()
    {
        $test = false;
        foreach ($this->getSourceKeys() as $key) {
            if (array_key_exists($key, $this->getSourceData())) {
                $test = true;
            } else {
                $test = false;
                throw new Exception("Warning: Invalid source key");
            }
        }
        return $test;
    }
    protected function select()
    {
        $this->setSourceKeys(["table", "fields", "where", "fetch", "count", "with-results", "fetch-control"]);
        if (!$this->verifySourceKeys()) {
            return false;
        } else {
            parent::setTable($this->getSourceData()["table"]);
            parent::setFields($this->getSourceData()["fields"]);
            parent::setWhere($this->getSourceData()["where"]);
            parent::setFetch($this->getSourceData()["fetch"]);
            parent::setCount($this->getSourceData()["count"]);
            parent::setWithResults($this->getSourceData()["with-results"]);
            parent::setFetchControl($this->getSourceData()["fetch-control"]);
            return parent::runSelect();
        }
    }


    protected function insert()
    {
        $this->setSourceKeys(["table", "data"]);
        if (!$this->verifySourceKeys()) {
            return false;
        } else {
            parent::setTable($this->getSourceData()["table"]);
            parent::setData($this->getSourceData()["data"]);
            return parent::runInsert();
        }
    }


    protected function update()
    {
        $this->setSourceKeys(["table", "set", "where"]);
        if (!$this->verifySourceKeys()) {
            return false;
        } else {
            parent::setTable($this->getSourceData()["table"]);
            parent::setFields($this->getSourceData()["set"]);
            parent::setWhere($this->getSourceData()["where"]);
            return parent::runUpdate();
        }
    }


    protected function delete()
    {
        $this->setSourceKeys(["table", "where"]);
        if (!$this->verifySourceKeys()) {
            return false;
        } else {
            parent::setTable($this->getSourceData()["table"]);
            parent::setWhere($this->getSourceData()["where"]);
            parent::runDelete();
        }
    }


    protected function query()
    {
        $this->setSourceKeys(["sql", "fetch", "data", "count", "with-results", "fetch-control"]);
        if (!$this->verifySourceKeys()) {
            return false;
        } else {
            parent::setSql($this->getSourceData()["sql"]);
            parent::setFetch($this->getSourceData()["fetch"]);
            parent::setData($this->getSourceData()["data"]);
            parent::setCount($this->getSourceData()["count"]);
            parent::setWithResults($this->getSourceData()["with-results"]);
            parent::setFetchControl($this->getSourceData()["fetch-control"]);
            return parent::runQuery();
        }

    }

}