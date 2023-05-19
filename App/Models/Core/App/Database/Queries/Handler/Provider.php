<?php


namespace Models\Core\App\Database\Queries\Handler;

use Exception;
use Models\Core\App\Helpers\Formatter;
use Models\Core\App\Utilities\Session;

class Provider extends Service
{
    /**
     * Summary of data
     * @var array
     */
    private $data = array();

    /**
     * Summary of formData
     * @var array
     */
    private $formData = array();

    /**
     * Summary of cachedData
     * @var array
     */
    private $cachedData = array();

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
     * Summary of queryData
     * @var array
     */
    private $queryData = array();

    /**
     * Summary of uniqId
     * @var string
     */
    private $uniqId = "";


    /**
     * Summary of uniqIdPrefix
     * @var mixed
     */
    private $uniqIdPrefix = "";


    /**
     * Summary of fieldItems
     * @var mixed
     */
    private $fieldItems = null;

    /**
     * Summary of joinClause
     * @var string
     */
    private $joinClause = "";

    /**
     * Summary of action
     * @var string
     */
    private $action = "";


    /**
     * Summary of count
     * @var int
     */
    private $fetch = 0;

    /**
     * @return mixed
     */
    public function getData()
    {
        if (count($this->data)) {
            return $this->data;
        } else {
            throw new Exception("Warning: Data has not been defined");
        }
    }

    /**
     * @param mixed $data 
     * @return self
     */
    public function setData($data): self
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCachedData()
    {
        if (count($this->cachedData)) {
            return $this->cachedData;
        } else {
            throw new Exception("Warning: Cached data has not been defined");
        }
    }

    /**
     * @param mixed $cachedData 
     * @return self
     */
    public function setCachedData(array $cachedData): self
    {
        array_push($this->cachedData, $cachedData);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFormData()
    {
        if (count($this->formData)) {
            return $this->formData;
        } else {
            throw new Exception("Warning: Form data has not been defined");
        }
    }

    /**
     * @param array $formData 
     * @return self
     */
    public function setFormData(array $formData): self
    {
        $this->formData = $formData;
        return $this;
    }


    /**
     * Summary of table
     * @return string
     */
    public function getTable()
    {
        if (!empty($this->table)) {
            return $this->table;
        } else {
            throw new Exception("Warning: Table has not been defined");
        }
    }

    /**
     * Summary of table
     * @param string $table Summary of table
     * @return self
     */
    public function setTable($table): self
    {
        $this->table = $table;
        return $this;
    }

    /**
     * Summary of queryData
     * @return array
     */
    public function getQueryData()
    {
        if (count($this->queryData)) {
            return $this->queryData;
        } else {
            throw new Exception("Warning: Query data has not been defined");
        }
    }

    /**
     * Summary of queryData
     * @param array $queryData Summary of queryData
     * @return self
     */
    public function setQueryData(array $queryData): self
    {
        $this->queryData = $queryData;
        return $this;
    }

    /**
     * Summary of uniqId
     * @return string
     */
    public function getUniqId()
    {
        if (!empty($this->uniqId)) {
            return strtoupper($this->uniqId);
        } else {
            throw new Exception("Warning: Uniq id has not been defined");
        }
    }

    /**
     * Summary of uniqId
     * @return self
     */
    public function setUniqId(): self
    {
        $this->uniqId = uniqid($this->getUniqIdPrefix());
        return $this;
    }

    /**
     * @return string
     */
    public function getUniqIdPrefix()
    {
        return $this->uniqIdPrefix;
    }

    /**
     * @param string $uniqIdPrefix 
     * @return self
     */
    public function setUniqIdPrefix(string $uniqIdPrefix): self
    {
        $this->uniqIdPrefix = $uniqIdPrefix;
        return $this;
    }


    /**
     * @return mixed
     */
    private function getFieldItems()
    {
        if (!empty($this->fieldItems)) {
            return $this->fieldItems;
        } else {
            throw new Exception("Warning: Field items have not been defined");
        }
    }

    /**
     * @param array|string $fieldItems 
     * @return self
     */
    public function setFieldItems(mixed $fieldItems): self
    {
        $this->fieldItems = $fieldItems;
        return $this;
    }

    /**
     * @return mixed
     */
    private function getJoinClause()
    {
        if (!empty($this->joinClause)) {
            return $this->joinClause;
        } else {
            throw new Exception("Warning: Join clause has not been defined");
        }
    }

    /**
     * @param mixed $joinClause 
     * @return self
     */
    public function setJoinClause(string $joinClause): self
    {
        $this->joinClause = $joinClause;
        return $this;
    }

    /**
     * Summary of action
     * @return string
     */
    private function getAction()
    {
        if (!empty($this->action)) {
            return $this->action;
        } else {
            throw new Exception("Warning: Query action has not been defined");
        }
    }

    /**
     * Summary of action
     * @param string $action Summary of action
     * @return self
     */
    public function setAction(string $action): self
    {
        $this->action = $action;
        return $this;
    }

    /**
     * Summary of where
     * @return array
     */
    private function getWhere()
    {
        return $this->where;
    }

    /**
     * Summary of where
     * @param array $where Summary of where
     * @return self
     */
    public function setWhere($where): self
    {
        $this->where = $where;
        return $this;
    }


    /**
     * Summary of count
     * @return int
     */
    private function getFetch()
    {
        return $this->fetch;
    }
    /**
     * Summary of count
     * @param int $fetch Summary of count
     * @return self
     */
    public function setFetch(int $fetch): self
    {
        $this->fetch = $fetch;
        return $this;
    }

    protected function prepareFormData()
    {
        foreach ($this->getData() as $dataItems => $formDataItems) {
            $this->setCachedData($formDataItems);
        }
        return;
    }


    protected function generateFormData(string $form)
    {
        $this->prepareFormData();
        foreach ($this->getCachedData() as $formData) {
            if (array_key_exists($form, $formData)) {
                $this->setFormData($formData[$form]);
            }
        }
        return;
    }

    protected function modifyFormDataKeys(string $search, string $replace, bool $prefix = false, string $prefixValue = null)
    {
        $keys = [];
        foreach (array_keys($this->getFormData()) as $key) {
            $key = str_replace($search, $replace, $key);
            if ($prefix) {
                $key = $prefixValue . $key;
            }
            array_push($keys, $key);
        }
        $this->setFormData(Formatter::run()->formatArray(array_values($this->getFormData()), $keys));
        return;
    }


    protected function pushSelectedKeys(array $keys)
    {
        $data = [];
        foreach ($keys as $key) {
            if (array_key_exists($key, $this->getFormData())) {
                array_push($data, $this->getFormData()[$key]);
            }
        }
        $data = Formatter::run()->formatArray($data, $keys);
        $this->setFormData($data);
        return;
    }


    protected function insert()
    {
        parent::setSourceData([
            "table" => $this->getTable(),
            "data" => $this->getQueryData()
        ]);
        if (parent::insert()) {
            return true;
        } else {
            return false;
        }
    }


    protected function update()
    {
        parent::setSourceData([
            "table" => $this->getTable(),
            "set" => $this->getQueryData()["set"],
            "where" => $this->getQueryData()["where"]
        ]);
        if (parent::update()) {
            return true;
        } else {
            return false;
        }
    }

    protected function select()
    {
        parent::setSourceData([
            "table" => $this->getTable(),
            "fields" => $this->getQueryData()["fields"],
            "fetch" => $this->getQueryData()["fetch"],
            "where" => $this->getQueryData()["where"],
            "count" => $this->getQueryData()["count"],
            "with-results" => $this->getQueryData()["with-results"],
            "fetch-control" => $this->getQueryData()["fetch-control"],
        ]);
        if (parent::select()) {
            return true;
        } else {
            return false;
        }
    }

    protected function query()
    {
        parent::setSourceData([
            "sql" => $this->getQueryData()["sql"],
            "fetch" => $this->getQueryData()["fetch"],
            "data" => $this->getQueryData()["data"],
            "count" => $this->getQueryData()["count"],
            "with-results" => $this->getQueryData()["with-results"],
            "fetch-control" => $this->getQueryData()["fetch-control"],
        ]);
        if (parent::query()) {
            return true;
        } else {
            return false;
        }
    }
    protected function queryDataWithResults()
    {
        $this->setQueryData([
            "sql" => "" . $this->getAction() . " " . $this->getFieldItems() . " FROM " . $this->getTable() . " " . $this->getJoinClause() . "",
            "fetch" => $this->getFetch(),
            "data" => $this->getWhere(),
            "count" => false,
            "with-results" => true,
            "fetch-control" => parent::getFetchControl()
        ]);
        $this->query();
        if ($this->hasResults()) {
            return $this->getResults();
        } else {
            return false;
        }

    }

    protected function selectWithResults()
    {
        $this->setQueryData([
            "table" => $this->getTable(),
            "fields" => $this->getFieldItems(),
            "fetch" => $this->getFetch(),
            "where" => $this->getWhere(),
            "count" => parent::getCount(),
            "with-results" => true,
            "fetch-control" => parent::getFetchControl()
        ]);
        $this->select();
        if ($this->hasResults()) {
            return $this->getResults();
        } else {
            die("No results found");
        }
    }

}