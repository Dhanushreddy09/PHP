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

$stmt->close();
$db->close();
?>