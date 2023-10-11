<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <?php
        include 'connection.php';
        if(isset($_POST['save'])){
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);
            $password = trim($_POST['password']);
            $password = md5($password);

            $check = mysqli_query($conn,"SELECT * FROM `student` WHERE `student`.`email` = '$email' OR `student`.`phone`= '$phone';");
            $count_if_user = mysqli_num_rows($check);
            if($count_if_user!=0){
                echo "<div class='alert alert-danger'>Email or Phone already registered</div>";
            }
            else{
                $insert = mysqli_query($conn,"INSERT INTO `student` ( `name`, `email`, `phone`, `password`) VALUES ( '$name', '$email', '$phone', '$password')");
                if($insert){
                    echo "<div class='alert alert-success'>Data Saved to DB successfully</div>";
                }
                else{
                    echo "<div class='alert alert-warning'>Error Occured while saving data.</div>";
                    echo "<div class='alert alert-warning'>Error Occured while saving data.</div>";
                }
            }
        }
        ?>
    <section class="container">
        <div class="mx-auto border p-5" style="width:75%">
            <h1>New Student Data</h1>
            <form action="create.php" method="post">
                <label for="">Name:</label>
                <input type="text" name="name" class="form-control" id=""><br>
                <label for="">email:</label>
                <input type="email" name="email" class="form-control" id=""><br>
                <label for="">phone:</label>
                <input type="tel" name="phone" class="form-control" id=""><br>
                <label for="">Password:</label>
                <input type="password" name="password" class="form-control" id=""><br>
                <input type="submit" name="save" value='Save no' class="btn btn-info" id=""><br>
            </form>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>