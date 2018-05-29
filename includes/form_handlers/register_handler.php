<?php


//Declaring variable to prevent errors
$fname = "";//first name
$lname = "";//last name
$em = "";//email 1
$em2 = ""; //email 2
$password= ""; //password
$password2= "";//password 2
$date= "";//signup date
$error_array= array();//holds error messages
$email_err_one = "Email already in use.<br>";
$email_err_two = "Invalid email format.<br>";
$email_err_three = "Emails dont match<br>";
$first_name_err = "Your first name must be between 2 and 25 characters.<br>";
$last_name_err = "Your last name must be between 2 and 25 characters.<br>";
$password_err_1 ="Your passwords do not match.<br>";
$password_err_2 = "Your password can only contain english characters or numbers<br>";
$password_err_3 = "Your password much be between 5 and 30 characters.<br>";

if(isset($_POST['register_button'])){

    //Resgistration form values
    //first name
    $fname = strip_tags($_POST['reg_fname']);//remove any HTML tags
    $fname = str_replace(' ', '', $fname );//remove any spaces
    $fname = ucfirst(strtolower($fname));//Uppercase first letter
    $_SESSION['reg_fname'] = $fname; //Stores first name into session

    //last name
    $lname = strip_tags($_POST['reg_lname']);//remove any HTML tags
    $lname = str_replace(' ', '', $lname );//remove any spaces
    $lname = ucfirst(strtolower($lname));//Uppercase first letter
    $_SESSION['reg_lname']= $lname; //Stores last name into session

    //email
    $em = strip_tags($_POST['reg_email']);//remove any HTML tags
    $em = str_replace(' ', '', $em );//remove any spaces
    $em = ucfirst(strtolower($em));//Uppercase first letter
    $_SESSION['reg_email']= $em; //Stores email into session

    //email2
    $em2 = strip_tags($_POST['reg_email2']);//rem2ove any HTML tags
    $em2 = str_replace(' ', '', $em2 );//rem2ove any spaces
    $em2 = ucfirst(strtolower($em2));//Uppercase first letter
    $_SESSION['reg_email2']= $em2; //Stores email2 into session

    //password
    $password = strip_tags($_POST['reg_password']);//remove any HTML tags
    $password2 = strip_tags($_POST['reg_password2']);//remove any HTML tags

    //date
    $date = date("Y-m-d"); //current date


    if($em == $em2) {
        //check if email is in valid format
        if(filter_var($em, FILTER_VALIDATE_EMAIL)) {
            $em = filter_var($em, FILTER_VALIDATE_EMAIL);

            //Check if email already exists
            $e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");

            //count rows returned
            $num_rows = mysqli_num_rows($e_check);

            if($num_rows > 0 ) {
                array_push($error_array, $email_err_one);
            }


        }
        else {
            array_push($error_array, $email_err_two);
        }
    }
    else {
        array_push($error_array, $email_err_three);
    }




    if(strlen($fname) > 25 || strlen($fname) < 2) {
        array_push($error_array, $first_name_err);
    }

    if(strlen($lname) > 25 || strlen($lname) < 2) {
        array_push($error_array, $last_name_err);
    }

    if($password != $password2) {
        array_push($error_array, $password_err_1);
    }
    else {
        if(preg_match('/[^A-Za-z0-9]/', $password)) {
            array_push($error_array, $password_err_2);
        }
    }

    if(strlen($password > 30 || strlen($password) < 5)){
        array_push($error_array, $password_err_3);
    }

    if(empty($error_array)){
        $password = md5($password);//encrypt password before sending to db
    
        //Generate username by concatenating first name and last name
        $username = strtolower($fname . "_" . $lname);
        $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
        $i = 0;
        //if username exists, add number to username
        while(mysqli_num_rows($check_username_query) != 0) {
            $i++; //add 1 to i
            $username = $username . "_" . $i;
            $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
            
        }
        //Profile picture assignment 
        $rand = rand(1,2);//create random number between 1 and two
        if($rand = 1)
        $profile_pic = "assets/images/profile_pics/defaults/head_deep_blue.png";
        else if ($rand = 2)
        $profile_pic = "assets/images/profile_pics/defaults/head_green_sea.png";
    
        $query = mysqli_query($con, "INSERT INTO users VALUES ('', '$fname', '$lname','$username', '$em', '$password', '$date', '$profile_pic', '0', '0', 'no', ',')");
        array_push($error_array, "<span style='color: #14C800;'>You're all set! Go ahead and log in!</span><br>");
    
        //Clear session variables
        $_SESSION['reg_lname'] = "";
        $_SESSION['reg_fname'] = "";
        $_SESSION['reg_email'] = "";
        $_SESSION['reg_email2'] = "";    
    
    }

}
?>