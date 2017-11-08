<!DOCTYPE html>
<html>
    <head>
        <title>Sorting Numbers </title>
    </head>
    <body>
    <h1>Sorting Numbers</h1>
    <br>
    <p>Enter 3 numbers from 1 to 50:</p>
    <br>
    
    Number 1: <input type="text" id="firstNumber" >
    
    <br>
    Number 2: <input type="text" id="secondNumber">
    
    <br>
    Number 3: <input type="text" id="thirdNumber">
    
    <br>
    <button onclick="myFunction()">Sort!</button>
    <p id="error"></p>
    <span>The biggest number is </span>
    <span id="big"> </span>
    <br>
    <br>
    <span>The numbers in ascending order are: </span>
    <span id="nums">   </span>
    
    
    
    
    <script>
        function myFunction()
        {
            console.log("running function");
                var firstNum = parseInt( document.getElementById('firstNumber').value,10);
                var secondNum = parseInt( document.getElementById('secondNumber').value,10);
                var thirdNum =  parseInt(document.getElementById('thirdNumber').value,10);
                var Numbers = new Array(firstNum,secondNum,thirdNum);
                var largestNum = Math.max.apply(Math, Numbers);
                
                console.log(Numbers)
                for(var i = 0 ; i < 3 ; i+=1)
                {
                    if(Numbers[i] < 1 || Numbers[i] > 50)
                    {
                        document.getElementById("error").innerHTML = "One of the numbers is out of range!!";
                        console.log("bad number");
                        return;
                    }
                }
                
                /*
                Array.max = function( Numbers )
                {
                    return Math.max.apply(Math, Numbers);
                };*/
                
                document.getElementById("big").innerHTML =  largestNum;

                
                Numbers.sort(function(a, b){return a - b});
                document.getElementById("nums").innerHTML =  Numbers;

            
            
        }
    </script>
    
    
    </body>
</html>