<?php

namespace Models\Core\App\Database\Shell;

use Exception;

define("ALLOW_DBQUERY_ACCESS", TRUE);
class Alter extends Query
{


    private $_table;

    private $_sql;


    public function table(string $table)
    {
        $this->_table = $table;
    }

    public function add(string $column, array $datatypes = array())
    {
        $datatype = "";
        if (count($datatypes) && isset($this->_table)) {
            foreach ($datatypes as $type) {
                $datatype .= $type;
            }
            $this->_sql = "ALTER TABLE {$this->_table} ADD IF NOT EXISTS $column  $datatype";
        } else {
            throw new Exception("Warning: Missing or invalid parameters");
        }
    }

    public function rename(string $oldName, string $newName, string $dataType)
    {
        if (isset($this->_table)) {
            $this->_sql = "ALTER TABLE {$this->_table} CHANGE {$oldName} {$newName} {$dataType}";
        } else {
            throw new Exception("Warning: Table has not yet been defined");
        }
    }


    public function modify(string $column, array $datatypes = array())
    {
        $datatype = "";
        if (count($datatypes) && isset($this->_table)) {
            foreach ($datatypes as $type) {
                $datatype .= $type;
            }
            $this->_sql = "ALTER TABLE {$this->_table} MODIFY $column  $datatype";
        } else {
            throw new Exception("Warning: Missing or invalid parameters");
        }
    }

    public function drop($column)
    {
        if (isset($this->_table)) {
            $this->_sql = "ALTER TABLE {$this->_table} DROP {$column}";
        } else {
            throw new Exception("Warning: Invalid table name");
        }
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