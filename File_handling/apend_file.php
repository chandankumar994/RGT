<?php
    $file = fopen("data.txt", "a"); // a = append (adds to file)
    fwrite($file, "New line added! by Ravi \n");
    fwrite($file, "A quick demo of the software showed how the new features would work.
                    He sent a demo tape to several record companies in hopes of getting signed.
                    The chef will demo several recipes at the cooking exhibition.
                    Visitors can watch product demos on the company website.
                    We can download a free demo version of the game to try before we buy.
                    The students organized a demo to protest the tuition fee hike.
                    The crew was hired to demo the old kitchen before the renovation could begin \n");
    fclose($file);
    echo "Lines added (appended!)";
?>