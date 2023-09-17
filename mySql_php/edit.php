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
        if(isset($_GET['delete'])){
            $uid = $_GET['delete'];
            $delete = mysqli_query($conn,"DELETE FROM `student` WHERE `student`.`id`='$uid'");
            if($delete){
                header("Location:read.php?delete=success");
            }
            else{
                header("Location:read.php?delete=fail");
            }
        }
        if(isset($_GET['edit'])){
            $uid_to_edit = $_GET['edit'];
            $fetch = mysqli_query($conn,"SELECT * FROM `student` WHERE `student`.`id` = '$uid_to_edit';");
            $count = mysqli_num_rows($fetch);
            if($count == 0 ){
                echo '<div class="alert alert-warning">No Data Found for user</div>';
            }
            else{
                while($row = mysqli_fetch_assoc($fetch)){
                    $name = $row['name'];
                    $email = $row['email'];
                    $phone = $row['phone'];
    ?>
    <section class="container">
        <div class="mx-auto border p-5" style="width:75%">
            <h1>New Student Data</h1>
            <form action="edit.php" method="post">
                <input type="hidden" name="uid" value="<?php echo $uid_to_edit?>;">
                <label for="">Name:</label>
                <input type="text" name="name" value="<?php echo $name?>;" class="form-control" id=""><br>
                <label for="">email:</label>
                <input type="email" name="email" value="<?php echo $email?>;" class="form-control" id=""><br>
                <label for="">phone:</label>
                <input type="tel" name="phone" value="<?php echo $phone?>;" class="form-control" id=""><br>
                <input type="submit" name="update" value="Update User Now" class="btn btn-info" id=""><br>
            </form>
        </div>
    </section>
    <?php
    ///////////////////////////////////
}
}
}
if(isset($_POST['update'])){
    $user_to_update = trim($_POST['uid']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    $update= mysqli_query($conn,"UPDATE `student` SET `name`='$name' ,`email`='$email',`phone`='$phone' WHERE `student`.`id` = '$user_to_update';");
    if($update){
        header("Location:read.php");
        echo '<div class="alert alert-success">User Updated Successfully</div>';
    }
    else{
        header("Location:read.php");
        echo '<div class="alert alert-danger">Error during updation</div>';
    }
}
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>