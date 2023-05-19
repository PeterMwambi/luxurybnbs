<?php

namespace Models\Core\App\Database\Shell;

use Exception;
use Models\Core\App\Database\Kernel\Execute as ExecuteSQL;


define("ALLOW_DBEXECUTE_ACCESS", TRUE);


class Query extends ExecuteSQL
{
    public function runSQL(string $sql, int $fetch, array $params = array())
    {
        parent::setSQL($sql);
        $this->bindParams($params);
        parent::setFetchMode($fetch);
        parent::executeQuery();
    }


    private function bindParams(array $params)
    {
        if (count($params)) {
            parent::setParams($params);
            parent::bindStatementWithParams();
        } else {
            parent::bindStatement();
        }
    }


    protected function bindSQL(string $action, string $table, int $fetch, array $where = array())
    {
        $operators = array("=", "<", ">", "<=", ">=", "LIKE");
        $values = array();
        $count = count($where);
        switch ($count) {
            case 0:
                $sql = "{$action} FROM {$table}";
                break;
            case 2:
                $condition = $where[0];
                $number = $where[1];
                $sql = "{$action} FROM {$table} {$condition} " . (int) $number;
                break;
            case 3:
                $field = $where[0];
                $operator = $where[1];
                $value = $where[2];
                if (!in_array($operator, $operators)) {
                    return false;
                }
                array_push($values, $value);
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
                break;
            case 5:
                $field = $where[0];
                $operator = $where[1];
                $value = $where[2];
                $condition = $where[3];
                $number = $where[4];
                if (!in_array($operator, $operators)) {
                    return false;
                }
                array_push($values, $value);
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ? {$condition} {$number}";
                break;
            case 6:
                $join_clause = $where[0];
                $table_1 = $where[1];
                $position = $where[2];
                $relationship_1 = $where[3];
                $operator = $where[4];
                $relationship_2 = $where[5];
                if (!in_array($operator, $operators)) {
                    return false;
                }
                $sql = "{$action} FROM {$table} {$join_clause} {$table_1} {$position} {$relationship_1} {$operator} {$relationship_2}";
                break;
            case 7:
                $first_field = $where[0];
                $first_operator = $where[1];
                $first_value = $where[2];
                $conditional_operator = $where[3];
                $second_field = $where[4];
                $second_operator = $where[5];
                $second_value = $where[6];
                if (!in_array($first_operator, $operators) && !in_array($operators, $second_operator)) {
                    return false;
                }
                array_push($values, $first_value, $second_value);
                $sql = "{$action} FROM {$table} WHERE {$first_field} {$first_operator} ? {$conditional_operator}
                        {$second_field} {$second_operator} ?";
                break;
            case 9:
                $join_clause = $where[0];
                $table_1 = $where[1];
                $position = $where[2];
                $relationship_1 = $where[3];
                $operator = $where[4];
                $relationship_2 = $where[5];
                $field = $where[6];
                $operator = $where[7];
                $value = $where[8];
                if (!in_array($operator, $operators)) {
                    return false;
                }
                array_push($values, $value);
                $sql = "{$action} FROM {$table} {$join_clause} {$table_1} {$position} {$relationship_1} {$operator} {$relationship_2} WHERE {$field} {$operator} ?";
                break;
        }
        if (count($values)) {
            $this->RunSQL($sql, $fetch, $values);
        } else {
            $this->RunSQL($sql, $fetch);
        }

    }

}