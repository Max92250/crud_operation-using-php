<?php include 'backend/sessions.php';?>
<?php include 'backend/front.php';?>
<html>

<head>
    <title>My first PHP Website</title>
</head>

<body>
    <h2>Edit page</h2>
    <p>Hello <?php Print "$user"?>!</p>
    <!--Display's user name-->
    <a href="logout.php">Click here to go logout</a><br /><br />
    <a href="home.php">Return to home page</a>
    <h2 align="center">Currently Selected</h2>
    <table border="1px" width="90%">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>date posted</th>
            <th>time posted</th>

        </tr>

        <tr>
            <td> <?php echo $row['id']?></td>
            <td> <?php echo $row['details']?></td>
            <td> <?php echo $row['date_posted']?></td>
            <td> <?php echo $row['time_posted']?></td>

        </tr>

    </table>

    <br />


    <form name="form" method="POST" action="">
        <input type="hidden" name="new" value="1" />
        <span>Name:</span>

        <input type="text" name="details" value="<?php echo $row['details'];?>" />

        <p><input name="submit" type="submit" value="Update" /></p>
    </form>


</body>

</html>