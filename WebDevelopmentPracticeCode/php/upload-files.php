<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php 
        if(isset($_POST["upload"])){
            $target_dir = "uploads/";
            $target_file = $target_dir.basename($_FILES["image"]["name"]);
            $file_size = getimagesize($_FILES["image"]["tmp_name"]);
            if(move_uploaded_file($_FILES["image"]["tmp_name"],$target_file)){
                echo "Uploaded Successfully";
            }
            else{
                echo "Not able to upload";
            }
        }
    ?>
    <form method="post" enctype="multipart/form-data">
        <label for="">Upload file</label>
        <input type="file" name = "image" accept ="image/*">
        <input type="submit" name="upload">
    </form>
</body>
</html>