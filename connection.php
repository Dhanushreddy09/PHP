<?php
$db=@ new mysqli("localhost","volhard","Dhanush@123","membership");
if($db->connect_error){
	echo "connection unsuccessfull";
}
?>