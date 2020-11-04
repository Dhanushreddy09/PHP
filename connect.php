<?php
$db=@new mysqli("localhost","root","","crisptouch");
if($db->connect_error){
	echo $db->connect_error;
}
else{
echo "connection successfull";
}

?>