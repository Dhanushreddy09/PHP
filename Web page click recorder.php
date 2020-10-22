<?php
if(file_exists("./sample.txt")){
$handle=fopen("./sample.txt","r");
$counter=fgets($handle);
fclose($handle);
$counter++;
echo "you are the ".$counter." visitor";
$handle=fopen("./sample.txt","w");
fwrite($handle,$counter);
fclose($handle);
}else{
	echo "You are the first visitor though";
	$handle=fopen("./sample.txt","w");
	fwrite($handle,1);
	fclose($handle);
}
?>