<?php
if(!empty($_POST['submit'])){
	if(empty($_POST['email'])||empty($_POST['password'])){
		exit("please fill all the fields <a href='./registration.php'>return</a> ");
	}
	$email=addslashes($_POST['email']);
	$password=addslashes($_POST['password']);
	require_once("./connection.php");
	$sql="SELECT* FROM `user` WHERE `email`='{$email}'";
	$result=$db->query($sql);
	if($db->error){
		exit("sql connection error <a href='./registration.php'>return</a> ");
	}
	if($result->num_rows==0){
		exit("email doesn't exist.Try registering <a href='./registration.php'>return</a> ");
	}
	$password=md5($password);
	$array=$result->fetch_array();
	$result->free();
	$db->close();
	if($password==$array['password']){
		setcookie("id",$array['user_id'],0,"/");
		$security=md5($array['user_id'].$array['password']."one_plus_one_is_three");
		setcookie("security",$security,0,"/");
		echo "<script>window.location.href='./homepage.php'</script>";
	}
	else{
		echo "Email or password is wrong"; 
	}
}
?>
Try registering If you haven't <a href="./registration.php"> Register</a>
<form action="" method="POST">
Email:<input type="text" name="email" value=""/><br />
password:<input type="password" name="password" value="" /><br />
<input type="submit" name="submit" value="Log In" />
</form>