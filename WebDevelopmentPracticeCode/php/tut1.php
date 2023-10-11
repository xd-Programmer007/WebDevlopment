<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Date funciton in php</h1>
    <?php
        $time_zone = date_default_timezone_get();
        echo "$time_zone";
        echo "<br>";
        echo "current time is: ".date("h:i:s:a");
        echo "<hr>";

        date_default_timezone_set("Asia/Kolkata");
        $time = date("h:i:s:a");
        echo $time;

        echo "<hr>";
        $date = date("l-d-M-Y");
        echo "date is :$date";
        echo "<hr>";
        $time = date("H:i:s");
        echo $time;
    ?>
</body>
</html>