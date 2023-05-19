<?php



$data = array(
    "firstname",
    "lastname",
    "security-question-1",
    "security-question-2",
    "security-question-3",
);

$keys = array();

foreach ($data as $item) {
    if (preg_match("/^[A-Za-z0-9-]*$/", $item)) {
        $item = str_replace(" ", "", ucwords(str_replace("-", " ", $item)));
    }
    array_push($keys, $item);
}

print_r($keys);

if (preg_match("/^[A-Za-z0-9-]*$/", "security-question-1")) {
    echo "true";
}

echo str_replace(" ", "", ucwords(str_replace("-", " ", "security-question-1")));