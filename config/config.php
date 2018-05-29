<?php
ob_start();//Turns on output buffering
session_start();

$timezone = date_default_timezone_set("America/Denver");
$con = mysqli_connect("localhost", "root", "", "demo_swirlfeed" );//Connection Variable


if(mysqli_connect_errno())
{
    echo "Failed to connect: " . mysqli_connect_errno();
}

?>