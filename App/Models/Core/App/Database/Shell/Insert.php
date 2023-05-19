<?php

namespace Models\Core\App\Database\Shell;

class Insert extends Query
{

    private $table;

    private $data;

    public function table(string $table)
    {
        $this->table = $table;
    }

    public function data(array $data)
    {
        $this->data = $data;
    }

    public function execute()
    {
        if (count($this->data)) {
            $keys = array_keys($this->data);
            $values = '';
            $x = 1;
            foreach ($this->data as $data) {
                $values .= '?';
                if ($x < count($this->data)) {
                    $values .= ',';
                }
                $x++;
            }
            $sql = "INSERT into {$this->table} (`" . implode('`, `', $keys) . "`) VALUES({$values})";
            $this->RunSQL($sql, 2, array_values($this->data));
            return true;
        }
        return false;
    }
}