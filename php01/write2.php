<?php
$name      = $_POST["name"];
$email     = $_POST["email"];
$age       = $_POST["age"];
$players    = $_POST["players"];
$memo       = $_POST["memo"];

$c      =",";
$str    =$name.$c.$email.$c.$age.$c.$players.$c.$memo;

$file   =fopen("data2.csv","a");
fwrite($file,$str."\n");
fclose($file);

header("Location: read2.php" );
exit;

?>