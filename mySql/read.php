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
    <section class="container">
        <?php
            if(isset($_GET['delete'])){
                if($_GET['delete']=="success"){
                    echo '<div class="alert alert-success">Deleted Successfully</div>';
                }
                else{
                    echo '<div class="alert alert-danger">Could Not be Deleted</div>';
                }
            }
            include 'connection.php';
            $fetch_all = mysqli_query($conn,"SELECT * FROM `student`;");
            $check_any = mysqli_num_rows($fetch_all);
            if($check_any == 0){
                echo "<div class='alert alert-warning'>No Data in the Table</div>";

            }
            else{
                ?>
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                    <?php
                    $i = 1;
                    while($row=mysqli_fetch_assoc($fetch_all)){?>
                        <tr>
                            <td><?php echo $i;$i=$i+1;?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['phone'];?></td>
                            <td>
                                <a class="btn btn-danger" href="edit.php?delete=<?php echo $row['id'];?>">Delete</a>
                                <a class="btn btn-danger" href="edit.php?edit=<?php echo $row['id'];?>">Edit</a>
                            </td>
                        </tr>

                    <?php } ?>
                </table>
            <?php
    }?>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    
</body>
</html>