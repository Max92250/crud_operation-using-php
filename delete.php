<?php
   

    if($_SERVER['REQUEST_METHOD'] == "GET")
    {
       $conn = mysqli_connect("localhost", "root", "","ping") or die(mysql_error());     //connect to server
     //Connect to database
       $id = $_GET['id'];
       mysqli_query($conn,"DELETE FROM list WHERE id='$id'");
       header("location:home.php");
    }
?>