<?php
session_start();

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <title>Document</title>
</head>


<body>
    <style>
    .alet {
        padding: 15px;
        background: #ffd48a;
        color: white;
        
    }
    .lp{
    text-align:center;
    padding:20px;
    color:blue;
}
    
    </style>
    <h2>Registration Page</h2>

    </a>
    <div class="sidenav">
        <div class="login-main-text">
            <h2>Application<br> Login Page</h2>
            <p>Login or register from here to access.</p>
        </div>
    </div>
    <div class="main">
        <div class="col-md-6 col-sm-12">



            <div class="login-form">
                <form action="backend/backend.php" method="POST">
                    <?php if(!empty($_SESSION['credentails'])){ ?>
                    <div class="alet">

                        <strong><?php echo $_SESSION['credentails']; ?> </strong>
                    </div>

                    <?php unset($_SESSION['credentails']); } ?>
                    <h3>Login</h3>
                    <hr style="width:50%;text-align:left;margin-left:0">
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" class="form-control" placeholder="username" name="username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>

                    <button type="submit" class="btn btn-black" name="submit">Login</button>
                    
                </form>
               <div  class="lp">
                <p>Or Sign Up Using </p>
               <a  href="pop.php">SIGN UP
                        </a>
                    </div>
            </div>
        </div>
    </div>


</body>

</html>