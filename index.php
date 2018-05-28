<?php 
$con = mysqli_connect("localhost", "root", "", "demo_swirlfeed" );//Connection Variable


if(mysqli_connect_errno())
{
    echo "Failed to connect: " . mysqli_connect_errno();
}

$query = mysqli_query($con, "INSERT INTO test VALUES ('1', 'Gregory' )");

?>
<html>
<head>  
    <title>SwirlFeed</title>
</head>
<body>
        Hello Greg!
</body>
</html>