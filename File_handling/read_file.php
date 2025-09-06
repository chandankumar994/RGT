<?php
    
    $content = file_get_contents("data.txt");

    echo nl2br($content); // nl2br = shows new lines in HTML
?>