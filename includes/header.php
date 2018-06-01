<?php 
require 'config/config.php';


if (isset($_SESSION['username'])){
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username = '$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
}
else {
    header("Location: register.php");
}
?>
<html>
<head>  
    <title>SwirlFeed</title>
    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <!-- CSS -->
    <Link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css"></Link>
    <Link rel="stylesheet" type="text/css" href="assets/css/style.css"></Link>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">


</head>
<body>

    <div class="top_bar">
        <div class="logo">
            <a href="index.php">SwirlFeed</a>
        </div>

        <nav>
        <a href="#">
                <?php
                    echo $user['first_name'];
                ?>
            </a>
            <a href="#">
                <i class="fas fa-home"></i>
            </a>
            <a href="#">
                <i class="fas fa-envelope"></i>
            </a>
            <a href="#">
                <i class="far fa-bell"></i>
            </a>
            <a href="#">
                <i class="fas fa-users"></i>
            </a>
            <a href="#">
                <i class="fas fa-cog"></i>
            </a>
        </nav>
    </div>
    <div class="wrapper">