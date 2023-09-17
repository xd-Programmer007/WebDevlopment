<?php
$db = "college";
$user = "root";
$host = "localhost";
$password = "";

$conn = mysqli_connect($host,$user,$password,$db);
if(!$conn){
    echo "Database is not connected";
}
?>