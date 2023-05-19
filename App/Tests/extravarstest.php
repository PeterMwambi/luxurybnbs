<?php


function TestVars(array $array, mixed...$vars)
{

    if (isset($vars)) {
        foreach ($vars as $var) {
            array_push($array, GetMatch($var));
        }
    }
    print_r($array);
}

function GetMatch(string $item)
{
    $matches = array("username" => "pmwambi", "firstname" => "peter", "lastname" => "mwambi");
    return $matches[$item];
}

TestVars(array(), "username", "firstname", "lastname");