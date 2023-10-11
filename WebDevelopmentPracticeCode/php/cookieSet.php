<?php
$cookieName= "Student";
$cookieInfo ="Bhutan Dhaag";
$time = time()+60;

setcookie($cookieName,$cookieInfo,$time);
echo "cookie is set";
?>
<?php
if(!isset($_COOKIE['Student'])){
    echo "Cookie is not stored<br>";
}
else{
    echo "Cookie has following info:<br>";
    foreach($_COOKIE as $x){
        echo $x." <br>";
    }
}
?>