

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 10: Photo Gallery </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style>
            


            body{
                color:#000066;
                background-color: #eeeeee;
                margin-left: 50px;
                font-family: 'Crete Round', serif;
                text-align: left;
            }
            

            
            #submit{
                color:white;
                background-color: red;
                width:100px;
                height: auto;
            }
            p{
                width: 500px;
            }
            .title{
                border-color: #000066;
                border-width: 2px;
                border-style: solid;
            }

            #submit:hover{
                color:red;
                background-color: white;
            }

        </style>
    </head>
    <body>

    <h2 class="title"> Photo Gallery </h2>
    <form method="POST" enctype="multipart/form-data"> 


        <input type="file" name="myFile" /> 
        
        <input id ="submit"type="submit" value="Upload File!" />

    </form>
<?php

    if($_FILES["myFile"]['size'] > 1000000)
    {
        echo "FILE IS TOO LARGE";
    } else{
        move_uploaded_file($_FILES["myFile"]["tmp_name"], "gallery/" . $_FILES["myFile"]["name"] );
  
          $files = scandir("gallery/", 1);
        
          
         
    }
     for ($i = 0; $i < count($files) - 2; $i++) {
             echo "<img id='". $files[$i] ."' src='gallery/" .   $files[$i] . "' width='50' class='pic' >";
              
        }
  
  
  

?>
<script>
        function expand(ims)
        {
            if($(ims).css('width')=='250px')
            {
                $(ims).css('width','50px');
                return;
            }
            $(ims).css('width','250px');
            
        }
            $("img").click(function(){
                console.log("wow");
                expand(this);
            });
        </script>
    </body>
</html>