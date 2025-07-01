<?php
$servername = "localhost";
$username = "root";
$password = "hema@4925";
$dbname = "milk_delivery";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)
{
    echo "Connection unsuccesfull...!!!".mysqli_error_count();;
}
?>