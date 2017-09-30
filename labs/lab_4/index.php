<?php
    $backgroundImage = "img/sea.jpg";
    include 'api/pixabayAPI.php';
    if(isset($_GET['keyword']))
    {
        
        if(!isset($_GET['category'])|| $_GET['category']=="")
        {
            if(isset($_GET['layout']))
            {
                 $imageURLs = getImageURLs($_GET['keyword'],$_GET['layout']);
            }
            else
            {
                  $imageURLs = getImageURLs($_GET['keyword']);
            }
              
        }else
        {
            if(isset($_GET['layout']))
            {
                 $imageURLs = getImageURLs($_GET['category'],$_GET['layout']);
            }
            else
            {
                $imageURLs = getImageURLs($_GET['category']);
            }
                
        }
        
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
   
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
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
            <input id="textbox"type = "text" name="keyword" placeholder="Keyword">
            <span id="box">
                <input type="radio" id="horizon"name="layout" value="horizontal"  checked
            ><label for="horizon">Horizontal</label>
            <input type="radio" id="vertic"name="layout" value="vertical"
            <?php
                if ($_GET['layout']=="vertical") {
                    echo "checked";
                }
             
             ?>><label for="vertic">Vertical</label>
            </span>
            
            <select name="category">
                <option value="">- Select One -</option>
                <option value="Dog">Dog</option>
                <option value="Cat">Cat</option>
                <option value="Fish">Fish</option>
                <option value="California">California</option>
            </select>
            <input id = "submit"type = "submit" value = "Submit"/>
        </form>

        <?php
        if (empty($_GET['keyword'])  && empty($_GET['category'])  ) {
            
                        echo "<h2 style='color:red'> Error! You must enter a keyword or category </h2>";
                        return;
                        exit;
            
                 }
            if(!isset($imageURLs)){
                echo "<h2> Type a keyword to display a slideshow <br/> with random images from Pixabay.com </h2>";
                
            } else {
                ?>
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <?php
                for($i = 0; $i < 5; $i++)
                {
                    do{
                        $randomIndex = rand(0, count($imageURLs));
                    } while (!isset($imageURLs[$randomIndex]));
                    //echo "<img src='".$imageURLs[$randomIndex]. "' width='200'>";
                    unset($imageURLs[$randomIndex]);
                }
            
                ?>
                    
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