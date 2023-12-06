<?php
    session_start(); //starts the session
    if(($_SESSION['user'] ) && ($_SESSION['img']) ){ // checks if the user is logged in  
    }
    else{
        header("location: index.php"); // redirects if user is not logged in
    } 
    $user = $_SESSION['user'];
    $img = $_SESSION['img'];
   

     //assigns user value
    ?>
   
    