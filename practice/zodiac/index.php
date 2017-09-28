<?php
function printYears($startYear,$endYear){
    $zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");

    $sum = 0;
    $ii = 0;
    $interation = 4;
     for($i = $startYear;$i <= $endYear; $i+=$interation)
        {
            echo "<li>Year $i";
            if($i == 1776)
            {
                echo " USA INDEPENDENCE";
            }
            if($i%100 == 0)
                echo " Happy New Century!";
            echo"</li>";
            if($i == 1900)
                $ii = 0;
            if($i>= 1900)
            {
                if($ii>11)
                $ii = 0; 
                echo "<img src='img/$zodiac[$ii].png'>";
                echo"<hr>";
                $ii+=$interation;
            }
            
            $sum = $sum + $i;
        }
        return $sum;
        
}?>
       

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <h1>Chinese Zodiac List</h1>
        <ul>
        <?php
         if(isset($_GET['startYear']))
            {
                $startYear = $_GET['startYear'];
            }
            if(isset($_GET['endYear']))
            {
                $endYear = $_GET['endYear'];
            }
            echo "<h1>Year Sum: ".printYears($startYear,$endYear)."</h1>";
        ?>
        </ul>
    </body>
</html>