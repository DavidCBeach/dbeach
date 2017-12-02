
             
        <?php
    include 'inc/header.php';
?>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
           <?php
           $pets = getPetList();
        //print_r($pets);
         echo "<div class='carousel-item active'>";
             echo  "<img class='d-block w-100' src='img/". strtolower($pets[0]['name']).".jpg'>";
             echo"</div>";
        $i = 0;
        foreach ($pets as $pet){
            if($i ==0)
            {
              $i=1;
              continue;
            }
            echo "<div class='carousel-item'>";
             echo  "<img class='d-block w-100' src='img/". strtolower($pet['name']).".jpg'>";
             echo"</div>";
        }
        
           ?>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <br /><br />
        <a class="btn btn-primary" href="adoptions.php" role="button">Adopt Now! </a>
        
<?php
    include 'inc/footer.php';
?>