<?php
if(isset($_COOKIE['id'])&&isset($_COOKIE['security'])){
	$id=addslashes($_COOKIE['id']);
	require_once("./connection.php");
	$sql="SELECT* FROM `user` WHERE `user_id`='{$id}'";
	$result=$db->query($sql);
	if($db->error){
		exit("database error");
	}
	if($result->num_rows==0){
		exit("<script>window.location.href='./log in.php'</script>");
	}
	$array=$result->fetch_array();
	$result->free();
	$db->close();
	$shell=md5($array['user_id'].$array['password']."one_plus_one_is_three");
	if($shell==$_COOKIE['security']){
		echo "Welcome ".$array['user_name']."<br/>";
		echo "you can log out by clicking here <a href='./logout'>log out</a>";
	}
	else{
		exit("<script>window.location.href='./log in.php'</script>");
	}
}
else{
	exit("<script>window.location.href='./log in.php'</script>");
	}

?>