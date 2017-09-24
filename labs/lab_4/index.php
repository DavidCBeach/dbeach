<?php
    $backgroundImage = "img/sea.jpg";

    if(isset($_GET['keyword']))
    {
        include 'api/pixabayAPI.php';
        $imageURLs = getImageURLs($_GET['keyword']);
        //print_r($imageURLs);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
        
        <style>
            @import url("css/styles.css");
            body {
                background-image: url('<?=$backgroundImage?>');
            }
        </style>
    </head>
    <body>
        <br/><br/>
        
        <form>
            <input type = "text" name="keyword" placeholder="Keyword">
            <input type = "submit" value = "Submit"/>
        </form>

        <?php
            if(!isset($imageURLs)){
                echo "<h2> Type a keyword to display a slideshow <br/> with random images from Pixabay.com </h2>";
                
            } else {
                for($i = 0; $i < 5; $i++)
                {
                    do{
                        $randomIndex = rand(0, count($imageURLs));
                    } while (!isset($imageURLs[$randomIndex]));
                    echo "<img src='".$imageURLs[$randomIndex]. "' width='200'>";
                    unset($imageURLs[$randomIndex]);
                }
            
        ?>
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indecators">
                            <?php
                                for($i = 0; $i < 5; $i++)
                                {
                                    echo"<li data-target='#carousel-example-generic' data-slide-to='$i'";
                                    echo($i == 0)?"class='active'": "";
                                    echo "></li>";
                                }
                            ?>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <?php
                                    for($i = 0; $i < 5; $i++)
                                    {
                                        do{
                                            $randomIndex = rand(0, count($imageURLs));
                                        } while (!isset($imageURLs[$randomIndex]));
                                        echo '<div class="item ';
                                        echo ($i ==0)?"active": "";
                                        echo '">';
                                        echo '<img src="'.$imageURLs[$randomIndex]  . '">';
                                        echo '</div>';
                                        unset($imageURLs[$randomIndex]);
                                    }
                                }
                            ?>
                        </div>
                         <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                    </div>
        
        
        
        <br/><br/>
    </body>
</html>