<?php

    function displaySymbol($file) { 
        
        echo "<img src='../labs/lab_2/img/$file.png' >";
    }


    $symbols = array("lemon","orange","cherry");
    
    print_r($symbols);//displays array contents only for debugging purposes
    
    echo $symbols[0];
    displaySymbol($symbols[1]);
    $symbols[] = "grapes"; //adds element at the end of the array
    $symbols[2] = "seven"; //updating element at index 2
    
    
    array_push($symbols,"seven"); //adds element ar the end of the array
    
    $lastSymbol = array_pop($symbols);
    foreach($symbols as $symbol){
        displaySymbol($symbol);
    }
    unset($symbols[2]); //remove index two
    $symbols = array_values($symbols); //re-indexes the array
    
?>



<!DOCTYPE html>
<html>
    <head>
        <title> PHP Arrays</title>
        
    </head>
    <body>
        
    </body>
</html>