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
    $password  = "123Abc";
    echo "Original string:".$password;
    echo "<br>";
    $encrypted = md5($password);
    echo "After Encryption with sha1:".$encrypted;
    echo "<hr>";

    echo "<h1> Implode function in php</h1>";
    $student = array('Binod Adhikari','CSE',18);
    echo $student[0];
    echo '<br>';
    $string = implode("",$student);
    echo "After Implode:<br>";
    echo $string;
    echo "<hr>";

    echo "<h1> Explode function in php</h1>";
    print_r(explode(" ",$string));
    echo "<hr>";
    echo "<h1> Trim function in PHP</h1>";
    $greeting = "Hello  ";
    $message = "Hello";
    $greeting = trim($greeting);
    if(strcmp($greeting,$message)==0)
        echo "Yes";
    else    
        echo "No";

    $str = "My name is Adarsh   ";
    echo "Without trim : $str <br>";
    $str1 = trim($str,"G ?");
    echo "After Trim :$str1";
    echo "<br>";
    echo "<h1> Strlower funciton in Php:</h1>";
    $greet = "Hello World, How ARE you Today?";
    echo "After Strlower: ",strtolower($greet);
    $greet1 = "Hello World, How ARE you Today?";
    echo "Without Strupper : $greet1<br>";
    echo "With Strupper : ".strtoupper($greet1);
    echo "<hr>";
    echo "<h1> Substr </h1>";
    $name= "Binod Adhikari";
    echo "the string is : $name <br>";
    echo "Substring is ".substr($name,6);
    echo "<br>";
    echo "<hr>";
    echo "<h1>Strcmp function :</h1>";

    $first_string = "Hi How are you?";
    $second_string = "Hi How are you?";
    $arr = array("name"=>"Adarsh Tiwari","College"=>"Acharya Institute of Technology","Age"=>19);
    $length = 0;
    foreach($arr as $length){
        $length++;
    }
    echo "This is the length of the string $$$$$$$".$length;
    echo strcmp($first_string,$second_string);

    echo "<br><br>";
    echo "Length of : $first_string , is:".strlen($first_string);
    echo "<br><hr>";
    echo "Reverse of :$second_string is :".strrev($second_string);
    echo "<br><hr>";
    ?>
</body>
</html>