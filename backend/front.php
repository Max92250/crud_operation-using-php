


<?php
$con=mysqli_connect("localhost", "root","","ping") 
  or die(mysql_error());  
$id=$_REQUEST['id'];
$query = "SELECT * from list where id=$id"; 
$result = mysqli_query($con, $query) or die ( mysqli_error($con));
$row = mysqli_fetch_assoc($result);
?>
 
    <?php
if(isset($_POST['new']) && $_POST['new']==1)
   {
      $conn =  mysqli_connect("localhost", "root", "","ping") or die (mysql_error());    //Connect to server
    
      $details = $_REQUEST['details'];
 
     
      $time = strftime("%X"); //time
      $date = strftime("%B %D, %Y"); //date
      
  
        $query = "UPDATE list
 SET details='".$details."' ,time_edited='".$time."',date_edited='".$date."'  WHERE id='".$id."'";
 
       $result = mysqli_query($conn, $query);
       
      


    if ($result) {

        header("location:home.php");
        } else {
        echo "Error updating record: " . mysqli_error($conn);
        }


   }
?>

