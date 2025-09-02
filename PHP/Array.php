<?php
$fruits = ["Apple", "Banana", "Cherry"];
array_push($fruits, "Mango");
array_pop($fruits);

foreach($fruits as $fruit) {
    echo $fruit . "<br>";
}
?>