<?php
$posttime=date('Y-m-d H:i:s');
require_once("./connect.php");
/*$sql="INSERT INTO `message` SET `user_name`='hemsworth',`post_time`='{$posttime}',`message`='I almost learnt curd'";
$db->query($sql);
if($db->error){
	echo $db->error;
}
else{
	echo "row added successfully";
}*/
if(!empty($_POST['submit'])){
	$_POST['user_name']=addslashes($_POST['user_name']);
	$_POST['message']=addslashes($_POST['message']);
	$sql="INSERT INTO `message` SET `user_name`='{$_POST['user_name']}',`post_time`='{$posttime}',`message`='{$_POST['message']}'";
	$db->query($sql);
	if($db->error){
	echo $db->error;
}
else{
	echo "<br /> row added successfully";
}
}
?>
<form action="" method="POST">
<br />
User Name:<input type="text" name="user_name" value ="" /><br />
Enter Message:<input type="text" name="message" value="" /><br />
<input type="submit" value="submit" name="submit" />
</form>