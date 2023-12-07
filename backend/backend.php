<?php 
session_start();
  $con = mysqli_connect('localhost', 'root', '', 'ping');
  $username = "";
  $email = "";
  if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql_u = "SELECT * FROM MyGuests WHERE firstname='$username'";

        $res_u = mysqli_query($con, $sql_u);
      

        if (mysqli_num_rows($res_u) > 0) {
         
          $_SESSION['error'] = 'username already taken';  
          header("location:http://localhost//tut/pop.php");      
  

        }else{
          
         $countfiles = count($_FILES['file']['name']);

         for($i=0;$i<$countfiles;$i++){
              $filename = $_FILES['file']['name'][$i];

              ## Location
              $location = "../local/".$filename;
              $extension = pathinfo($location,PATHINFO_EXTENSION);
              $extension = strtolower($extension);

              ## File upload allowed extensions
              $valid_extensions = array("jpg","jpeg","png","pdf","docx");

              $response = 0;
              ## Check file extension
              if(in_array(strtolower($extension), $valid_extensions)) {
                   ## Upload file
                   if(move_uploaded_file($_FILES['file']['tmp_name'][$i],$location)){
                    
                    
                    $query = "INSERT INTO MyGuests (firstname, email, password,img_dir) 
                    VALUES ('$username', '$email', '".md5($password)."','$location')";
             $results = mysqli_query($con, $query);
  
             if($results){
              header("location:http://localhost//tut/max.php");    
  
             }
             
             exit();

                       
                   }
              }

         }
        
    }
          
        
  }
  if (isset($_POST['submit'])) {

    
    $username =$_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);
    
    

    
    $query = mysqli_query($con,"Select * from MyGuests WHERE firstname='$username' and password='$password'"); // Query the 
    $row = mysqli_fetch_assoc($query);                                                  
    $exists = mysqli_num_rows($query); 
    $table_users = "";
    $table_password = "";
    if($exists) 
    {
      
       
             $_SESSION['user'] = $username;
             $_SESSION['img'] = $row['img_dir'];
            
             

           
                                              
             header("location:http://localhost//tut/home.php");    

         
      
    }
    else
    {
      $_SESSION['credentails'] = "incorrect username or password!";
      header("location:http://localhost//tut/max.php"); 
    }
   }
  
?>