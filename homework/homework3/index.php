
<?php
    $en = array(
        array(
            array("domestic cat","felis silvestris catus","a small furry mammal that lives with humans.","a small domesticated carnivorous mammal with soft fur, a short snout, and retractile claws. It is widely kept as a pet or for catching mice, and many breeds have been developed."),
            array("tiger","Panthera tigris","An orange cat with black stripes, very large","the largest cat species, most recognizable for their pattern of dark vertical stripes on reddish-orange fur with a lighter underside"),
            array("lion","Panthera leo","Large cat that lives in Africa and India.","a large tawny-colored cat that lives in prides, found in Africa and northwestern India. The male has a flowing shaggy mane and takes little part in hunting, which is done cooperatively by the females."),
            
        ),
        array(
            array("tuna","Allothunnus fallai","a saltwater fish that belongs to the tribe Thunnini","a large and active predatory schooling fish of the mackerel family. Found in warm seas, it is extensively fished commercially and is popular as a game fish."),
            array("goldfish","Carassius auratus","A small freshwater fish that is commonly kept in an aquarium.","a small reddish-golden Eurasian carp, popular in ponds and aquariums. A long history of breeding in China and Japan has resulted in many varieties of form and color."),
            array("salmon","Salmo salar ","A fish that grows up in the ocean but is born in freshwater.","a large edible fish that is a popular game fish, much prized for its pink flesh. Salmon mature in the sea but migrate to freshwater streams to spawn."),
            ),
        array(
            array("parrot","Psittaciformes","A bird that can mimic the human voice.","a bird, often vividly colored, with a short down-curved hooked bill, grasping feet, and a raucous voice, found especially in the tropics and feeding on fruits and seeds. Many are popular as cage birds, and some are able to mimic the human voice."),
            array("hummingbird","Trochilidae","One of the smallest bird that make a humming sound as they fly","a small nectar-feeding tropical American bird that is able to hover and fly backward, typically having colorful iridescent plumage."),
            array("owl","Strigiformes","Nocturnal birds that have loud calls","a nocturnal bird of prey with large forward-facing eyes surrounded by facial disks, a hooked beak, and typically a loud call."),
            ),
        );
    function showInfo($info,$technical,$picture,$size){
        echo "<h1>".$info[0]."</h1>";
        if($technical)
        {
            echo"<p>technical word: ".$info[1]."</p>";
        }
        if($picture)
        {
            echo"<img src='img/".$info[0].".jpg' >";
        }
        
        if($size == "small")
        {
            echo"<p>Small Definition:</p>";
            echo"<p>".$info[2]."</p>";
        } 
        else 
        {
            echo"<p>Large Definition:</p>";
            echo"<p>".$info[3]."</p>";
        }
    }
    //showInfo($en[1][1],true,true,"small");
    
    
    
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Small Animal Encyclopedia </title>
        <style type="text/css">
             @import url("css/styles.css");
        </style>
       <link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet"> 
    </head>
    <body>
        <h1>Small Animal Encyclopedia</h1>
        <form>
            <span class=title>Keyword:</span>
            <input id="textbox"type = "text" name="keyword" placeholder="Keyword">
            <span class=title>Size of Information:</span>
            <span id="box">
                <input type="radio" id="small"name="size" value="small"  checked
            ><label for="small">Small</label>
            <input type="radio" id="large"name="size" value="large"
            <?php
                if ($_GET['size']=="large") {
                    echo "checked";
                }
             
             ?>><label for="large">Large</label>
            </span>
            <span class=title>Category:</span>
            <select name="Category">
                <option value="">All</option>
                <option value="0"<?php
                if ($_GET['Category']=="0") {
                    echo "selected";
                }
             
             ?>>Cats</option>
                <option value="1"<?php
                if ($_GET['Category']=="1") {
                    echo "selected";
                }
             
             ?>>Fish</option>
                <option value="2"<?php
                if ($_GET['Category']=="2") {
                    echo "selected";
                }
             
             ?>>Birds</option>
            </select>
            
            
            <span id=options class=title>Options: </span>
               <input type="checkbox" name="optiont" value="technical"<?php
                if ($_GET['optiont']=="technical" ) {
                    echo "checked";
                }
             
             ?>> <label for="technical">Technical Words</label>
    <input type="checkbox" name="optionp" value="picture"<?php
                if ($_GET['optionp']=="picture") {
                    echo "checked";
                }
             
             ?>> <label for="picture">Picture</label>
             <input id = "submit"type = "submit" value = "Submit"/>
            <form method="get">

     <div id = help>try keywords: domestic cat,tiger, lion, tuna, goldfish, salmon, parrot, hummingbird, owl</div>
   <div id="info">
       

<?php
if(!isset($_GET['keyword']))
{
    echo "enter a keyword, choose a size, choose a category, choose options, press submit";
} else{
    $picture = false;
if(isset($_GET['optionp']))
{
    $picture = true;   
}
$technical = false;
if(isset($_GET['optiont']))
{
    $technical = true;   
}
$find = false;
$word = $_GET['keyword'];
if($_GET['keyword'] != "")
{
    if($_GET['Category']=="")
    {
        
        for($i = 0; $i < 3; $i++)
        {
            $ii = 0;
            foreach($en[$i] as $categories)
            {
                if($categories[0]==$word)
                {
                    showInfo($en[$i][$ii],$technical,$picture,$_GET['size']);
                     $find = true;
                }
                $ii++;
            }
        }
        if(!$find)
        {
            echo "<p>No match for keyword.</p>";
        }
    } else{
            
            $ii = 0;
            $i = $_GET['Category'];
            foreach($en[$i] as $categories)
            {
                if($categories[0]==$word)
                {
                    showInfo($en[$i][$ii],$technical,$picture,$_GET['size']);
                    $find = true;
                }
                $ii++;
            }
            if(!$find)
            {
                echo "<p>No match for keyword in the current category.</p>";
            }
    }
    
} else {
    if($_GET['Category']!="")
    {
            $ii = 0;
            $i = $_GET['Category'];
            //print_r($i);
            foreach($en[$i] as $categories)
            {
                showInfo($en[$i][$ii],$technical,$picture,$_GET['size']);
                $ii++;
            }
    } else{
        for($i = 0; $i < 3; $i++)
        {
            $ii = 0;
            foreach($en[$i] as $categories)
            {
                    showInfo($en[$i][$ii],$technical,$picture,$_GET['size']);
                $ii++;
            }
        }
    }
}

}

?>

   </div>
    </body>
</html>