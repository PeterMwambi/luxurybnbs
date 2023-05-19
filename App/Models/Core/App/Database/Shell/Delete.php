<?php

namespace Models\Core\App\Database\Shell;

define("ALLOW_DBQUERY_ACCESS", true);


class Delete extends Query
{

    private $_table;

    private $_where;

    public function table(string $table)
    {
        $this->_table = $table;
    }

    public function where(array $where)
    {
        $this->_where = $where;
    }

    public function execute()
    {
        if (count($this->_where) === 3) {
            $this->BindSQL("DELETE", $this->_table, 2, $this->_where);
            return true;
        } else {
            $this->BindSQL("DELETE", $this->_table, 2);
            return true;
        }
    }
}