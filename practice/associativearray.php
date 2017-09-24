<?php
session_start(); //starts session


$_SESSION['Juan'] = 40;
if(isset($_SESSION['Juan'] ))
{
    echo $_SESSION["Juan"];
}
$players = array();
$players["John"] = 20;



?>       