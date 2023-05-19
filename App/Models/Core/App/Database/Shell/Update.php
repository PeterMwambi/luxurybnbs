<?php

namespace Models\Core\App\Database\Shell;

class Update extends Query
{


    private $_table;

    private $_fields;

    private $_where;


    public function table(string $table)
    {
        $this->_table = $table;
    }

    public function set(array $field)
    {
        $this->_fields = $field;
    }

    public function where(array $where)
    {
        $this->_where = $where;
    }

    public function execute()
    {
        if (count($this->_fields)) {
            $set = "";
            $x = 1;
            foreach ($this->_fields as $field => $value) {
                $set .= "{$field} = ?";
                if ($x < count($this->_fields)) {
                    $set .= ", ";
                }
                $x++;
            }
            if (count($this->_where)) {
                $where = "";
                foreach ($this->_where as $whereField => $whereValue) {
                    $where .= "{$whereField} = ?";
                }
                $sql = "UPDATE {$this->_table} SET {$set} WHERE {$where}";
                array_push($this->_fields, $whereValue);
                if ($this->RunSQL($sql, 2, array_values($this->_fields))) {
                    return true;
                }
            }
            return false;
        }
        return false;
    }
}