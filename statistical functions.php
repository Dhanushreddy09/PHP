<?php
require_once("./connect.php");
//count function
$sql="SELECT count(*),`user_name` FROM `message`";
$result=$db->query($sql);
if(!$result){
	exit("sql error");
}
$array=$result->fetch_array();
echo "<br />We have ".$array['count(*)']." no.of messages";
//max function
$sql="SELECT max(`message_id`) FROM `message`";
$result=$db->query($sql);
if(!$result){
	exit("sql error");
}
$array=$result->fetch_array();
echo "<br />There are a maximum of ".$array['max(`message_id`)']." messages" ;
//min function
$sql="SELECT min(`message_id`) FROM `message`";
$result=$db->query($sql);
if(!$result){
	exit("sql error");
}
$array=$result->fetch_array();
echo "<br />The Id of first message is ".$array['min(`message_id`)'] ;
//average function
$sql="SELECT avg(`message_id`) FROM `message`";
$result=$db->query($sql);
if(!$result){
	exit("sql error");
}
$array=$result->fetch_array();
echo "<br />The average of message_id's is  ".$array['avg(`message_id`)']."<br />" ;
//Order By and Group By
$sql="SELECT `user_name`,`message`,max(`message_id`) AS `max_id` FROM `message` GROUP BY `user_name` ORDER BY `message_id` ASC";
$result=$db->query($sql);
if(!$result){
	exit("sql error");
}
while($array=$result->fetch_array()){
	echo "The maximum id is ".$array['max_id']."and the message is ".$array['message']."<br />";
}


?>