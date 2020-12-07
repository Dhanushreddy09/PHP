<?php
$db=@ new mysqli("localhost","root","","membership");
if($db->connect_error){
	echo "connection unsuccessfull";
}
?>