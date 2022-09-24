<!-- take phone number and validate it  -->
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
        if(isset($_POST['check'])){
            $phone_number = trim($_POST['phone']);
            if(strlen($phone_number) == 10 && $phone_number[0] > 5 and is_numeric($phone_number)){
                echo "<h1> Valid phone Number</h1>";
            }
            else{
                echo "<h1> Invalid Phone number </h1>";
            }
        }
    ?>
    <form method="POST">
        <input type="number" name="phone" id="" placeholder="Enter your phone number">
        <input type="submit" name ="check" value="Check Now">
    </form>
</body>
</html>