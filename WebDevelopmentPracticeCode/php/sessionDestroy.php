<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
</head>
<body>
    <h1>Destroy session variable</h1>
    <?php
        $_SESSION['email'] = "tiwariadarsh125@gmail.com";
        $_SESSION['phone']  =7012219336;
        $email = $_SESSION['email'];
        $phone = $_SESSION['phone'];

        echo $email;
        echo "<br>";
        echo $phone."<hr>";
        session_unset();
        session_destroy();
    ?>
</body>
</html>