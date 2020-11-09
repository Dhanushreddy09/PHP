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
		echo "Login successful";
		echo "Your user name is ".$array['user_name'];
	}
	else{
		echo "Email or password is wrong"; 
	}
}
?>
<form action="" method="POST">
Email:<input type="text" name="email" value=""/><br />
password:<input type="password" name="password" value="" /><br />
<input type="submit" name="submit" value="Log In" />
</form>