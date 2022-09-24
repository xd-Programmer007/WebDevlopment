<?php session_start();?>
<form action="login-php.php" method="post">
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
$def_email = "abc@gmail.com";
$def_pass = "12345";

if(isset($_POST['login'])){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    if($email ==$def_email and $password == $def_pass){
        $_SESSION['name'] = $name;
        header("Location: home.php");
    }
    else{
        echo "Email and password do not match";
    }
}

?>