<?php
    session_start();
    if($_SESSION['user']){
    }
    else{ 
       header("location:index.php");
    }

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
       $details = $_POST['details'];
       $time = strftime("%X"); //time
       $date = strftime("%B %d, %Y"); //date
       $decision = "no";
   
       $conn = mysqli_connect("localhost","root","") or die(mysql_error());       //Connect to server
       mysqli_select_db($conn,"ping") or die("Cannot connect to database"); //Connect to database
     
       mysqli_query($conn,"INSERT INTO list(details, date_posted, time_posted) 
                    VALUES ('$details','$date','$time')"); //SQL query
       header("location:home.php");
    }
    else
    {
       header("location:home.php"); //redirects back to home
    }
?>