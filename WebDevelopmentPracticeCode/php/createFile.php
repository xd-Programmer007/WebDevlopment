<?php 
$myfile = fopen("test.txt","w") or die("unable to open file!");
$txt = "Dhoni\n";
fwrite($myfile,$txt);
fclose($myfile);
?>