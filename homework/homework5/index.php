


<!DOCTYPE html>

<html>
    <head>
         <meta charset='utf-8' />
        <title> Place Finder</title>
        <link  href="css/styles.css" rel="stylesheet" type="text/css" />
         <link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet"> 
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script>
        function getInfo(){
            $.ajax({
         data: {'search':$("#searcha").val()},
         type: "GET",
         url: "insertSearch.php",
         success: function(status){
             console.log(status);
         }
        });
        $.ajax({
         data: {'search':$("#searcha").val()},
         type: "GET",
         url: "getNumber.php",
         success: function(data){
             console.log("wow"+data);
             $("#number").html('The keyword "'+$("#searcha").val()+'" has been searched '+data+' time(s)');
         }
        });
        $.ajax({
         data: {'search':$("#searcha").val()},
         type: "GET",
         url: "getHistory.php",
         success: function(data){
             console.log(data);
             $("#histories").html("Search History: <br>"+data);
         }
        });
            console.log($("#searcha").val());
            console.log("wow");
            var show = $("#geo").val()
            console.log(show);
            if(show =='s')
            {
                document.getElementById("longandlat").style.display = "block";
                console.log("wowcool");
            } else
            {
                document.getElementById("longandlat").style.display = "none";
            }
            $.ajax({
            type: "GET",
            url: "https://maps.googleapis.com/maps/api/geocode/json?",
            dataType: "json",
            data:{'address':$("#searcha").val(),
                'sensor':'false'
            },
            success: function(data,status) {
              console.log(data['results'][0]['address_components'][2]['long_name']);
              $("#lon").html(data['results'][0]['geometry']['location']['lng']);
              $("#lat").html(data['results'][0]['geometry']['location']['lat']);
                $("#addr").html("");
              for(var value in data['results'][0]['address_components'])
              {
                  $("#addr").append(data['results'][0]['address_components'][value]['long_name']);
                  console.log(data['results'][0]['address_components'][value]['long_name']);
                  $("#addr").append(" ")
              }
              
              

            },
            
            complete: function(data,status) { //optional, used for debugging purposes

                                
            }

        });
          
        return false;
        }
            $(document).ready(  function(){
        
        $("#searcha").change( function(){ getInfo(); } );
    } ); 
    
        </script>

    </head>
    <body>
        <h1> Place Finder </h1>
    <form onsubmit="return getInfo()">

            Place:  <input type="text" id="searcha"><br> 
 
           
            Info: <select id="geo" name="geo">
                <option value="ds"> Don't Show Latitude and Longitude</option>
                <option value="s"> Show Latitude and Longitude</option>
            </select><br />
           
            <input type="submit" id="submit" value="submit">
    </form>
    
    <div id="number"></div>
    <div id="histories"></div>
    <h3>Information</h3>
    <div id="output">
        <div id="longandlat">
            Latitude:  <span id="lat"></span><br>
            Longitude: <span id="lon"></span><br>
        </div>
        
        
        Address: <span id="addr"></span><br>
        
    </div>
    <br>  <br>  <br>  <br>  <br>

    
    </body>
    
</html>


