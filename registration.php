<?php
        //check if user had clicked the submit button
		//check if user has filled every form
		//check weather the two passwords are identical
        //check username and password using regular expressions
        //username:"/^.{2,50}$/"
        //password:	"/^.{6,50}$/"	
		//email:"/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/"
		//security check of user input data using addslashes
		//check if email address has been used before
		//destroy object of email adress check
		//encrypt password using md5 buit in function
		//if everything is fine then insert user or add user to database
		if(!empty($_POST['submit'])){
			if(empty($_POST['user_name'])||empty($_POST['email'])||empty($_POST['password'])||empty($_POST['re_password'])){
				exit("please enter all the fields.<a href='./registration.php'>return</a>");
			}
			if($_POST['password']!==$_POST['re_password']){
				exit("Two Passwords are not identical <a href='./registration.php'>return</a>");
			}
			$pattern="/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/";
			if(!preg_match($pattern,$_POST['email'])){
				exit("please enter valid email <a href='./registration.php'>return</a>");
			}
			$pattern="/^.{6,50}$/";
			if(!preg_match($pattern,$_POST['password'])){
				exit("password is too weak <a href='./registration.php'>return</a>");
			}
			$user_name=addslashes($_POST['user_name']);
			$email=addslashes($_POST['email']);
			$password=addslashes($_POST['password']);
			require_once("./connection.php");
			$sql="SELECT* FROM `user` WHERE `email`='{$email}'";
			$result=$db->query($sql);
			if($db->error){
				exit("sql error.<a href='./registration.php'>return</a>");
			}
			if($result->num_rows!==0){
				exit("The user with same email ID already exists <a href='./registration.php'>return</a>");
			}
			//destroy the object after use
			$result->free();
			$password=md5($password);
			$sql="INSERT INTO `user` SET `user_name`='{$user_name}',`email`='{$email}',`password`='{$password}'";
			$result=$db->query($sql);
			$db->close();
			if($result==true){
				echo "registration successfull";
			}
			else{
				echo "registration unsuccessful";
			}
		}
?>
<form action="" method="POST">
UserName:<input type="text" name="user_name" value=""/><br />
Email:<input type="email" name="email" value=""/><br />
Password:<input type="password" name="password" value=""/><br />
Renter Password:<input type="password" name="re_password" value=""/><br />
<input type="submit" name="submit" value="Register"/>
</form>