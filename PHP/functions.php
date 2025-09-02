<?php
// Built-in
$country="Austrilia";

echo strlen("Hello Ravi");

$country_lenght = strlen($country);
echo ("Country lenth of " .$country. " is ".$country_lenght);


echo ("<br><br><br> User Defined Fuction<br/>");

// User-defined

function hellotest($name) {
    return "Hello Mr/.Mrs. " . $name;
}

echo hellotest("Ravi ji");


echo ("<br><br><br> User Defined Fuction 2<br/>");

function sum($one, $two) {
    return $one+$two;
}
echo sum(88,12);



//get lenth using function:

echo ("<br><br><br> User Defined Fuction 3<br/>");

function getlength($city) {
    return strlen($city);
}
echo getlength("Gorakhpur");

?>