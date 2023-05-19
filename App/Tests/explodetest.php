<?php



//Methods validating 

$string = "DatabaseWriter/ValidateRegisterMemberUsername";

$methodBoundary = explode("/", $string);

$Keys = array_keys($methodBoundary);

$WriteNewKeys = ["class", "method"];

$Keys = array_replace($Keys, $WriteNewKeys);

$methodBoundary = ((object) array_combine($Keys, array_values($methodBoundary)));

echo "Class: " . $methodBoundary->class . " Method: " . $methodBoundary->method;



//String with and without forward slashes
$stringWithoutForwardSlashes = "string";
$stringWithForwardSlashes = "string/sub-string";

$explodedString = explode("/", $stringWithoutForwardSlashes);



print_r($explodedString); //array([0] => string)

echo count($explodedString); // 1



$string = "Models\Core\App\Database\Queries\Create\Staff/memberRegistration";


$explodedString = explode("/", $string);

print_r($explodedString);