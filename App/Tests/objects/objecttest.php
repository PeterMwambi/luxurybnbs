<?php


$dependancies = array(
    "rules" => array(
        "staff-login" => array(
            "step-1" => "app/config/rules/staff-login/step1-rules.json",
        )
    )
);


function getUrlFromDependancies(string $path)
{

}


function formatDependanciesToObject(array $dependancies)
{
    return ((object) $dependancies);
}


function getValueFromDependancy(string $key, array $dependancies)
{
    $dependancies = (object) $dependancies;
    if (property_exists($dependancies, $key)) {
        return $dependancies->$key;
    } else {
        throw new Exception("Warning: Property " . $key . " was not found");
    }
}




print_r(json_decode(file_get_contents(__DIR__ . "\/test.json")));