<?php

$validate = new Validate;
if (method_exists($validate, $keywords->method)) {
    $method = $keywords->method;
    $sourceData = [
        "table" => $keywords->table,
        "fields" => $keywords->column,
        "where" => [$keywords->column, "=", $data[$key]]
    ];
    switch ($keywords->exists) {
        case false:
            switch ($validate->$method($sourceData)) {
                case true:
                    $this->bindError($errors->$key->$keyword);
                    return;
            }
            break;
        case true:
            switch ($validate->$method($sourceData)) {
                case false:
                    $this->bindError($errors->$key->$keyword);
                    return;
            }
            break;
    }

}