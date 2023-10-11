<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
</head>
<body>
    <h1>Logged out Successfully.</h1>
    <?php 
        session_start();
        session_unset();
        session_destroy();

        header("Location : welcome.php?login=Logged Out Successfully");
        die();
    ?>
</body>
</html>