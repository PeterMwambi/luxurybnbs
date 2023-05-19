<?php

namespace Models\Core\App\Database\Shell;

use Exception;

class Select extends Query
{


    private $fields;

    private $table;

    private $fetch;

    private $where = array();

    public function fields(array $fields)
    {
        $this->fields = $fields;
    }

    public function table(string $table)
    {
        $this->table = $table;
    }

    public function fetch(int $fetch)
    {
        $this->fetch = $fetch;
    }

    public function where(array $where)
    {
        $this->where = $where;
    }
    public function execute()
    {
        if (count($this->fields)) {
            $fieldValue = '';
            $x = 1;
            foreach ($this->fields as $field) {
                $fieldValue .= $field;
                if ($x < count($this->fields)) {
                    $fieldValue .= ', ';
                }
                $x++;
            }
            if (count($this->where)) {
                return parent::bindSQL("SELECT {$fieldValue}", $this->table, $this->fetch, $this->where);
            } else {
                return parent::bindSQL("SELECT {$fieldValue}", $this->table, $this->fetch);
            }
        }
        throw new Exception("Warning: Fields were not found");
    }

}