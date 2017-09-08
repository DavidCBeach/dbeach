<!DOCTYPE html>
<?php
    function getRandomColor(){
        return "rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0,255)/255).");";
    }
?>

<html>
    <head>
        <meta http-equiv="refresh" content="0.25" > 
        <title> Random Background Color</title>
        <meta charset="utf-8"/>
        <style>
            body{
                /* background-color:rgba(0,150,150,1);*/
                <?php
                    /*$red = rand(0,255);
                    $green = rand(0,255);
                    $blue = rand(0,255);
                    $alpha = (float)((float)rand(0,100)/(float)100);*/
                    //echo "background-color:rgba($red,$green,$blue,$alpha);"
                    echo "background-color:".getRandomColor();
                ?>
            }
            h1{
                
                <?php
                    
                    echo "color:".getRandomColor();
                ?>
            }
            h3{
                
                <?php
                    
                    echo "color:".getRandomColor();
                ?>
            }
        </style>
    </head>
    <body>
        <h1>Welcome!</h1>
        <h3>Productions</h3>
    </body>
</html>