<?php
$posttime=date('Y-m-d H:i:s');
require_once("./connect.php");
$sql="INSERT INTO `message` SET `user_name`='hemsworth',`post_time`='{$posttime}',`message`='I almost learnt curd'";
$db->query($sql);
if($db->error){
	echo $db->error;
}
else{
	echo "row added successfully";
}
?>
