<?php
$host = "localhost";
$user = "root";
$password="";
$db="college";

$conn = mysqli_connect($host,$user,$password,$db);

if(!$conn){
    echo "DB Connection failed";
}
?>