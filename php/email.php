<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_POST['send'])){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    
    $subject = "Enquiry from website";
    $to = "tiwariadarsh125@gmail.com";

    $message = "Users Details are as:\n";
    $message.="Name".$name."\n";
    $message.="Email".$email."\n";
    $message.="Phone".$phone."\n";

    $headers ="From: $email \r\n";
    $headers = "MIME-Version 1.0\n";
    $headers .= "Content-Type: text/html:charset=\"iso-8859-1\"\n";
    $headers .="X-Priority: 1(Highest)\n";
    $headers .= "X-MSMAIL-Priority:High\n";
    $headers .= "Importance: High\n";

    $retval = mail($to,$subject,$message,$headers);
    if($retval){
        echo "Email Sent";
    }
    else{
        echo "Not able to send email";
    }
}
?>
<form  method="post">
    <label for="">Name:</label>
    <input type="text" name="name" id=""><br>
    <label for="">Email:</label>
    <input type="email" name="email" id=""><br>
    <label for="">Phone:</label>
    <input type="number" name="phone" id=""><br>
    <input type="submit" name ="send">


</form>
</body>
</html>
