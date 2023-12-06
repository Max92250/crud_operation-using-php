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


        <table class="table table-striped" border="1px" width="90%">
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
    
                                                                             //database
            $query = mysqli_query($conn,"Select * from list");                      // SQL Query
            while($row = mysqli_fetch_array($query))
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