<?php session_start();?>
<form action="welcome.php" method="post">
    <label for="">Name:</label>
    <input type="text" name="name" id="">
    <br>
    <label for="">Email:</label>
    <input type="email" name="email" id="">
    <br>
    <label for="">Password:</label>
    <input type="password" name="password" id="">
    <input type="submit" value="Login Now" name="login">
</form>
<?php
if(isset($_GET['login'])){
    echo $_GET['login'];
}

if(isset($_POST['login'])){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $_SESSION['name'] = $name;
    header("Location: home.php");
}

?>