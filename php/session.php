<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <h1>Session In Php</h1>
    <?php
    $_SESSION['email'] = "aolbinod@gmail.com";
    $_SESSION['phone']=8989797890;
    echo "The values in Session variable:<br>";
    echo $_SESSION['email']."<br>";
    echo $_SESSION['phone']."<br>";

    
    ?>
</body>
</html>