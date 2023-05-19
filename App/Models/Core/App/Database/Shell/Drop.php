<?php


namespace Models\Core\App\Database\Shell;

use Exception;

define("ALLOW_DBQUERY_ACCESS", true);

class Drop extends Query
{

    private $_sql;
    public function database(string $database)
    {
        $this->_sql = "DROP DATABASE {$database}";
    }

    public function table(string $table)
    {
        $this->_sql = "DROP TABLE {$table}";
    }

    public function execute()
    {
        if (isset($this->_sql)) {
            parent::RunSQL($this->_sql, 2);
        } else {
            throw new Exception("Warning: No SQL statement was found");
        }
    }
}