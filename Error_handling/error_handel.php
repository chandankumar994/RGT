<?php
    try 
    {
        $num1 = 10;
        $num2 = 0;
        if ($num2 == 0) 
        {
            throw new Exception("Cannot divide by zero!");
        }
        
        echo $num1 / $num2; ///actual work hai jo aap ko karana hai..
    } 
    catch (Exception $e) 
    {
        echo "Error: " . $e->getMessage();
    }
?>