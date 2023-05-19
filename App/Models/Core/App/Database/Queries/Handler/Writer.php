<?php

namespace Models\Core\App\Database\Queries\Handler;

use Exception;
use Models\Core\App\Database\Shell\Delete;
use Models\Core\App\Database\Shell\Insert;
use Models\Core\App\Database\Shell\Query;
use Models\Core\App\Database\Shell\Select;
use Models\Core\App\Database\Shell\Update;


class Writer
{
    /**
     * Summary of query
     * @var Query
     */
    private $query = null;
    /**
     * Summary of select
     * @var Select
     */
    private $select = null;

    /**
     * Summary of insert
     * @var Insert
     */
    private $insert = null;

    /**
     * Summary of update
     * @var Update
     */
    private $update = null;

    /**
     * Summary of delete
     * @var Delete
     */
    private $delete = null;

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
     * Summary of data
     * @var mixed array | string
     */
    private $data = null;

    /**
     * Summary of fetch
     * @var int
     */
    private $fetch = 0;

    /**
     * Summary of fields
     * @var array
     */
    private $fields = array();

    /**
     * Summary of withResults
     * @var bool
     */
    private $withResults = false;

    /**
     * Summary of count
     * @var bool
     */
    private $count = false;


    /**
     * Summary of hasCount
     * @var bool
     */
    private $hasCount = false;

    /**
     * Summary of hasResults
     * @var bool
     */
    private $hasResults = false;

    /**
     * Summary of results
     * @var mixed object | array
     */
    private $results = null;

    /**
     * Summary of sql
     * @var string
     */
    private $sql = "";


    /**
     * Summary of fetchControl
     * @var string|null
     */
    private $fetchControl = null;




    /**
     * @return mixed
     */
    private function getTable()
    {
        if (!empty($this->table)) {
            return $this->table;
        } else {
            throw new Exception("Warning: Database table has not been defined");
        }
    }

    /**
     * @param string $table 
     * @return self
     */
    protected function setTable(string $table): self
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @return mixed
     */
    private function getWhere()
    {
        if (is_array($this->where)) {
            return $this->where;
        } else {
            throw new Exception("Warning: Database where clause has not been defined");
        }
    }

    /**
     * @param array $where 
     * @return self
     */
    protected function setWhere(array $where): self
    {
        $this->where = $where;
        return $this;
    }

    /**
     * @return mixed
     */
    private function getData()
    {
        if (is_string($this->data) || is_array($this->data)) {
            return $this->data;
        } else {
            throw new Exception("Warning: Data has not been defined");
        }
    }

    /**
     * @param mixed $data 
     * @return self
     */
    protected function setData(mixed $data): self
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return int
     */
    private function getFetch()
    {
        if (is_int($this->fetch)) {
            return $this->fetch;
        } else {
            throw new Exception("Warning: Database fetch value has not been defined");
        }
    }

    /**
     * @param int $fetch 
     * @return self
     */
    protected function setFetch(int $fetch): self
    {
        $this->fetch = $fetch;
        return $this;
    }

    /**
     * @return mixed
     */
    private function getFields()
    {
        if (count($this->fields)) {
            return $this->fields;
        } else {
            throw new Exception("Warning: Database fields have not been defined");
        }
    }

    /**
     * @param mixed $fields 
     * @return self
     */
    protected function setFields($fields): self
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getResults()
    {
        if (is_object($this->results) || is_array($this->results)) {
            return $this->results;
        } else {
            throw new Exception("Warning: Database Results have not been defined");
        }
    }

    /**
     * @param mixed $results 
     * @return self
     */
    protected function setResults(mixed $results): self
    {
        $this->results = $results;
        return $this;
    }

    /**
     * @return mixed
     */
    private function getWithResults()
    {
        if (is_bool($this->withResults)) {
            return $this->withResults;
        } else {
            throw new Exception("Warning: Results handler has not been defined");
        }
    }

    /**
     * @param bool $withResults 
     * @return self
     */
    protected function setWithResults(bool $withResults = false): self
    {
        $this->withResults = $withResults;
        return $this;
    }

    /**
     * @return string
     */
    public function getSql()
    {
        if (!empty($this->sql)) {
            return $this->sql;
        } else {
            throw new Exception("Warning: Database sql query has not been defined");
        }
    }

    /**
     * @param mixed $sql 
     * @return self
     */
    public function setSql(string $sql): self
    {
        $this->sql = $sql;
        return $this;
    }

    /**
     * @return string
     */
    public function getFetchControl()
    {
        if (!empty($this->fetchControl)) {
            return $this->fetchControl;
        } else {
            return "array";
        }
    }

    /**
     * Options: 
     * 1. object - Returns results an object
     * 2. array - Returns results an array
     * @param mixed $fetchControl 
     * @return self
     */
    public function setFetchControl(mixed $fetchControl): self
    {
        $this->fetchControl = $fetchControl;
        return $this;
    }


    private function resultFetchControl()
    {
        return match ($this->getFetchControl()) {
            "object" => "getResultsAsObject",
            "array" => "getResultsAsArray",
            default => null
        };
    }

    /**
     * Summary of select
     * @throws Exception
     * @return Writer
     */
    protected function runSelect()
    {
        $this->select = new Select;
        $this->select->fields($this->getFields());
        $this->select->table($this->getTable());
        $this->select->where($this->getWhere());
        $this->select->fetch($this->getFetch());
        $this->select->execute();
        if ($this->getCount()) {
            if ($this->select->getCount()) {
                $this->setHasCount(true);
            } else {
                $this->setHasCount(false);
            }
            return $this;
        }
        if ($this->getWithResults()) {
            $fetchControl = $this->resultFetchControl();
            if ($this->select->getCount()) {
                $this->setResults($this->select->$fetchControl());
                $this->setHasResults(true);
            } else {
                $this->setHasResults(false);
            }
            return $this;
        }
        return $this;
    }


    /**
     * Summary of insert
     * @return void
     */
    protected function runInsert()
    {
        $this->insert = new Insert;
        $this->insert->table($this->getTable());
        $this->insert->data($this->getData());
        $this->insert->execute();
        return;
    }


    /**
     * Summary of update
     * @return void
     */
    protected function runUpdate()
    {
        $this->update = new Update;
        $this->update->table($this->getTable());
        $this->update->set($this->getFields());
        $this->update->where($this->getWhere());
        $this->update->execute();
        return;
    }


    /**
     * Summary of delete
     * @return void
     */
    protected function runDelete()
    {
        $this->delete = new Delete;
        $this->delete->table($this->getTable());
        $this->delete->where($this->getWhere());
        $this->delete->execute();
        return;
    }


    /**
     * Summary of query
     * @throws Exception
     * @return Writer
     */

    protected function runQuery()
    {
        $this->query = new Query;
        $this->query->runSQL($this->getSql(), $this->getFetch(), $this->getData());
        if ($this->getCount()) {
            if ($this->query->getCount()) {
                $this->setHasCount(true);
            } else {
                $this->setHasCount(false);
            }
            return $this;
        }
        if ($this->getWithResults()) {
            $fetchControl = $this->resultFetchControl();
            if ($this->query->getCount()) {
                $this->setResults($this->query->$fetchControl());
                $this->setHasResults(true);
            } else {
                $this->setHasResults(false);
            }
            return $this;
        }
        return $this;
    }



    /**
     * Summary of count
     * @return bool
     */
    public function getCount()
    {
        if (is_bool($this->count)) {
            return $this->count;
        } else {
            throw new Exception("Warning: Database verify count has not been defined");
        }
    }

    /**
     * Summary of count
     * @param bool $count Summary of count
     * @return self
     */
    public function setCount(bool $count): self
    {
        $this->count = $count;
        return $this;
    }

    /**
     * Summary of hasCount
     * @return bool
     */
    public function hasCount()
    {
        if (is_bool($this->hasCount)) {
            return $this->hasCount;
        } else {
            throw new Exception("Warning: Count identifier has not been defined");
        }
    }

    /**
     * Summary of hasCount
     * @param bool $hasCount Summary of hasCount
     * @return self
     */
    private function setHasCount(bool $hasCount): self
    {
        $this->hasCount = $hasCount;
        return $this;
    }

    /**
     * Summary of hasResults
     * @return bool
     */
    public function hasResults()
    {
        if (is_bool($this->hasResults)) {
            return $this->hasResults;
        } else {
            throw new Exception("Warning: Results identfier has not been defined");
        }
    }

    /**
     * Summary of hasResults
     * @param bool $hasResults Summary of hasResults
     * @return self
     */
    private function setHasResults(bool $hasResults): self
    {
        $this->hasResults = $hasResults;
        return $this;
    }
}