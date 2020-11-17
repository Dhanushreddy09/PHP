<?php
//This technique only works for INNODB storage engine
require_once("./connection.php");
$db->autocommit(false);
$amount=50;
$sql="UPDATE `picture` SET `picture_id`=`picture_id`-$amount WHERE `user_id`=4";
$result1=$db->query($sql);
$sql="UPDATE `picture` SET `picture_id`=`picture_id`+$amount WHERE-e `user_id`=6";
$result2=$db->query($sql);
if($result1&&$result2){
	$db->commit();
	echo "success";
}
else{
	$db->rollback();
	echo "Transaction failed and aborted";
}
$db->autocommit(true);
$db->close();
?>