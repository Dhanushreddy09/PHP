<?php
require_once("./connection.php");
$stmt=$db->stmt_init();
$sql="INSERT INTO `user` SET `user_name`=?,`email`=?,`password`=?";
$result=$stmt->prepare($sql);
if(!$result){
	exit("sql error");
}
$username="Maria";
$email="maria@gmail.com";
$password="maria123";
$stmt->bind_param("sss",$username,$email,$password);
if($stmt->execute()){
	echo $stmt->insert_id;
}
//Retriving data from database(The R operation)
$sql="SELECT `user_name` FROM `user` WHERE `user_id`=?";
if(!$stmt->prepare($sql)){
	exit("sql error");
}
$user_id=4;
$stmt->bind_param("s",$user_id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($user_name);
while($stmt->fetch()){
	echo $user_name;
}
$stmt->close();
$db->close();
?>