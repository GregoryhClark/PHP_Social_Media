<?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';

?>

<html>
<head>
    <title>Welcome to Swirlfeed!</title>
    <Link rel="stylesheet" type="text/css" href="assets/css/register_style.css"></Link>
    <!-- jquery link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
</head>
<body>

    <?php 

    if(isset($_POST['register_button'])){
        echo '
        <script>
        
        $(document).ready(function() {
            $("#first").hide();
            $("#second").show();
        });
        
        </script>
        ';
    }
    ?>
    <div class="wrapper">
    
    <div class="login_box"> 
    <div class="login_header">
        <h1>Swirlfeed!</h1>
        login or sign up below!
    </div>
    <div id="first">
    <form action = "register.php"  method="POST">
        <input type="email" name = "log_email" placeholder="Email Address" value="<?php 
            if(isset($_SESSION['log_email'])) {
                echo $_SESSION['log_email'];
            }
            ?>" required>
        <br>
        <input type="password" name = "log_password" placeholder="Password" required>
        <br>
        <?php if(in_array("Email or password was incorrect<br>", $error_array)) echo "Email or password was incorrect<br>"; ?>
        <input type="submit" name = "login_button" placeholder="Login">
        <br>
        <a href="#" id="signup" class="signup">Need an account? Register here.</a>

    </form>
    </div>

    
    <div id="second">
    <form action="register.php" method ="Post">
        <input type="text" name="reg_fname" placeholder="First Name" value ="<?php 
        if(isset($_SESSION['reg_fname'])){
            echo $_SESSION['reg_fname'];    
        }
        ?>" required>
        <br>
        <?php if(in_array($first_name_err , $error_array)) echo $first_name_err ?>
        

        <input type="text" name="reg_lname" placeholder="Last Name" value ="<?php 
        if(isset($_SESSION['reg_lname'])){
            echo $_SESSION['reg_lname'];    
        }
        ?>"required>
        <br>
        <?php if(in_array($last_name_err , $error_array)) echo $last_name_err ?>

        <input type="email" name="reg_email" placeholder="Email" value ="<?php 
        if(isset($_SESSION['reg_email'])){
            echo $_SESSION['reg_email'];    
        }
        ?>"required>
        <br>
      

        <input type="email" name="reg_email2" placeholder="Confirm Email" value ="<?php 
        if(isset($_SESSION['reg_email2'])){
            echo $_SESSION['reg_email2'];    
        }
        ?>" required>
        <br>
        <?php if(in_array($email_err_one , $error_array)) echo $email_err_one;
        else if(in_array($email_err_two , $error_array)) echo $email_err_two;
        else if(in_array($email_err_three , $error_array)) echo $email_err_three; ?>
        

        <input type="password" name="reg_password" placeholder="Password" value ="<?php 
        if(isset($_SESSION['password'])){
            echo $_SESSION['password'];    
        }
        ?>"required>
        <br>
        <input type="password" name="reg_password2" placeholder="Confirm Password" required>
        <br>
        <?php if(in_array($password_err_1 , $error_array)) echo $password_err_1;
        else if(in_array($password_err_2 , $error_array)) echo $password_err_2;
        else if(in_array($password_err_3 , $error_array)) echo $password_err_3; ?>

        <input type="submit" name="register_button" value="Register">
        <br>
        <?php if(in_array("<span style='color: #14C800;'>You're all set! Go ahead and log in!</span><br>", $error_array)) echo "<span style='color: #14C800;'>You're all set! Go ahead and log in!</span><br>"; ?>
        <a href="#" id="sign_in" class="sign_in">Already have an account? Sign in here.</a>

    </form>
    </div>
    </div>
    </div>
</body>
</html>