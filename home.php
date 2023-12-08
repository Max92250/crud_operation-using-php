<?php include 'backend/sessions.php';?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="styles/home.css" /> 
  
</head>
<style>
    body{
        background:#f5f5fa;
    }
    .pagination {   
     
    width:400px;
    padding-bottom:20px;

    margin:0 auto;
    padding-left:40px;
    
    

}   
.pagination a {   
    font-weight:bold;   
    font-size:18px;   
    color: black;   
    float: left;   
    padding: 8px 16px;   
    text-decoration: none;   
    border:1px solid black;   
}   
.pagination a.active {   
        background-color: pink;   
}   
.pagination a:hover:not(.active) {   
    background-color: skyblue;   
}   

.page{
    width:95%;
    margin:0 auto;
    height:300px;
    margin-bottom:50px;
    box-shadow: rgba(17, 17, 26, 0.05) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 0px 8px;
    border-radius:50px;
}
.table{
    border-radius:50px;
}

    </style>

<body>
   
   
    <nav class="navbar navbar-light bg-light justify-content-between">
        <div class="hong"> 

    <h3>hello <lable></label><?php Print "$user"?> 🤪</h3>
</div>
  <div class="inline">
  <?php
                echo "<td>" . "<img src=".$img.' width="80px;", height="80px;" class="inline">' . "</td>"

            ?>
  </div>
</nav>
  
   

   
   
  
     
    <div class="lp">
        <!--Displays user's name-->
        <a href="logout.php">Click here to go logout</a><br /><br />
        <form action="add.php" method="POST">
            Add more to list: <input type="text" name="details" /> <br />

            <input type="submit" value="Add to list" />
        </form>
        <h2 align="center">My list</h2>
       
<div class="page">
        <table class="table table-striped" border="1px">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Details</th>
                    <th>date time</th>
                    <th>post time</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
            $conn = mysqli_connect("localhost", "root","","ping") or die(mysql_error());     //Connect to server
    
                                                                             
         
            $per_page_record = 7; 
            if (isset($_GET["page"])) {    
                $page  = $_GET["page"];    
           }    
           else {    
                 $page=1;    
           } 
           $start_from = ($page-1) * $per_page_record;  
           $query = "SELECT * FROM list LIMIT $start_from, $per_page_record";       
           $rs_result = mysqli_query ($conn, $query);         

            while($row = mysqli_fetch_array($rs_result))
            {
                Print "<tr>";
			        Print '<td >'. $row['id'] . "</td>";
			        Print '<td >'. $row['details'] . "</td>";
                    Print '<td>'. $row['date_posted'] . 
                    " - " . $row['time_posted'] . "</td>";
                    Print '<td>'. $row['date_edited'] . 
                    " - " . $row['time_edited'] . "</td>";
                    Print '<td ><a href="edit.php?id='. 
                    $row['id'] .'">edit</a></td>';
              Print '<td ><a href="#" onclick="myFunction('.$row['id'] .')">delete</a></td>';
          
			       
			
		        Print "</tr>";
            }
        ?>
                </tr>
            </tbody>

        </table>

        </div>
        <div class="pagination">    
      
        <?php  
        $query = "SELECT COUNT(*) FROM list";     
        $rs_result = mysqli_query($conn, $query);     
        $row = mysqli_fetch_row($rs_result);     
        $total_records = $row[0];     
          
    echo "</br>";     
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);     
        $pagLink = "";       
      
        if($page>=2){   
            echo "<a href='home.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='home.php?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='home.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a href='home.php?page=".($page+1)."'>  Next </a>";   
        }   
  
      ?>    
      </div>
        <script>
        function myFunction(id) {
            var r = confirm("Are you sure you want to delete this record?");
            if (r == true) {
                window.location.assign("delete.php?id=" + id);
            }
        }
        </script>
        <div>


</body>

</html>