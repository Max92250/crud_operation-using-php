<?php  
  session_start();  
?>
<html>

<head>

    <title>Register</title>

    <link rel="stylesheet" type="text/css" href="styles/styless.css" />

</head>

<body>
    <style>
    .alert {
        padding: 20px;
        background-color: #f44336;
        color: white;
    }
    </style>

    <div class="container">

        <div class="screen">

            <div class="screen__content">

                <form class="login" method="post" action="backend/backend.php" enctype='multipart/form-data'>
                    <div class="lo">
                        <p class="lo">Registration Form</p>

                    </div>
                    <div class="login__field">

                        <input type="text" class="login__input" placeholder="User name" name="username">
                        <?php if(!empty($_SESSION['error'])){ ?>
                        <div class="alert">

                            <strong><?php echo $_SESSION['error']; ?> </strong>
                        </div>

                        <?php unset($_SESSION['error']); } ?>
                    </div>
                    <div class="login__field">

                        <input type="email" class="login__input" placeholder="email" name="email">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" placeholder="Password" name="password">
                    </div>

                    <div class="login__field">

                        <input type="file" name="file[]" id="file" multiple><br /><br />
                    </div>
                    <input type="submit" name="register" class="button login__submit" />


                </form>
                <div class="social-login">

                    <div class="social-icons">
                        <a href="#" class="social-login__icon fab fa-instagram"></a>
                        <a href="#" class="social-login__icon fab fa-facebook"></a>
                        <a href="#" class="social-login__icon fab fa-twitter"></a>
                    </div>
                </div>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>

</body>

</html>