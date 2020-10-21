<?php
//require_once("php_one.php");
$handle=fopen("./sample.txt","r");
$content="";
while(!feof($handle)){
	$content.=fread($handle,100);
};
echo $content;
?>