<?php
$name = "<h1>My name is Adarsh</h1>";
echo "$name <br>";

$sanitized = filter_var($name,FILTER_SANITIZE_STRING);
echo $sanitized;
echo "<hr>FILTER A INTEGER<br>";
$number  = 10;
if(filter_var($number,FILTER_VALIDATE_INT)===false){
    echo "this is not a integer";
}
else{
    echo "valid integer";
}

echo "<hr>sanitize email <br>";

$email = "tiwariadarsh125@gmail.com";
$email = filter_var($email,FILTER_VALIDATE_EMAIL);

if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
    echo "INVALID EMAIL<BR>";
    exit();
}
else{
    echo  "VALID EMAIL<br>";
}

?>