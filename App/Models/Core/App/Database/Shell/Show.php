<?php

namespace Models\Core\App\Database\Shell;

use Exception;

class Show extends Query
{

    private $_sql = null;

    private $_fetch;

    public function databases()
    {
        $this->_sql = "SHOW DATABASES";
    }

    public function fetch(int $fetch)
    {
        $this->_fetch = $fetch;
    }

    public function columns(string $table)
    {
        $this->_sql = "SHOW COLUMNS FROM {$table}"; //Use Prepared statements for more safer queries
    }

    public function tables(string $database)
    {
        $this->_sql = "SHOW TABLES FROM {$database}";
    }


    public function execute()
    {
        if (isset($this->_sql) && isset($this->_fetch)) {
            parent::runSQL($this->_sql, $this->_fetch);
        } else {
            throw new Exception("Warning: No SQL statement was found");
        }
    }
}