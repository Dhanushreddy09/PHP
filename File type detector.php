<?php
$string1="Hello, Iam Tharaka";
echo $string1;
$string2="http.jpeg";
var_dump(str_replace('Tharaka','Dhanush',$string1,$counter));
echo $counter;
var_dump(substr($string1,3));
$array=explode(".",$string1);
var_dump(array_pop($array));
?>