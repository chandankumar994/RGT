<?php
    $file = fopen("data.txt", "w"); // w = write (overwrites file)

    fwrite($file, "Hello World!\n");

    fclose($file);
    
    echo "Data written!";
?>