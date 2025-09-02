<?php
$marks = 75;

// if-else
if ($marks >= 50) {
    echo "Pass";
} else {
    echo "Fail";
}

echo"<br/> Learning Switch <br/>";

// switch
$day = "abc";
switch($day) 
{
    case "Mon": echo "Start of week"; break;
    case "Tue": echo "2nd day of week"; break;
    default: echo "No match found"; break;
}

echo"<br/> Learning loop <br/>";

// loop

for ($i=1; $i<=5; $i++) {
    echo "Number: $i <br>";
}
?>