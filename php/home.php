<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
</head>
<body>
    <?php 
        if(!isset($_SESSION['name'])){
            header("Location: welcome.php?login=Login First");
            die();
        }
    ?>
    <h1>Welcome to home page; <?php echo $_SESSION['name']." ".$_SESSION['email']." ".$_SESSION['password'];  ?><a href="logout.php">Logout</a></h1>
</body>
</html>