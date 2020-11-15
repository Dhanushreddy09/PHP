<?php
require_once("./connection.php");
$sql="
SELECT p.`user_id`,u.`user_id`,p.`picture_id`,u.`user_name`
FROM `picture` AS `p`,`user` AS `u`
WHERE p.`user_id`=u.`user_id` AND u.`user_id`=9
";
$result=$db->query($sql);
if(!$result){
	exit("sql error");
}
while($array=$result->fetch_array()){
	echo "The username is ".$array['user_name']." and picture id is ".$array['picture_id']."<br />";
}
?>