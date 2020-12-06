<?php
include_once("connection.php");
$sql="
SELECT p.`user_id`,u.`user_id`,p.`picture_id`,u.`user_name`
FROM `picture` AS `p` RIGHT JOIN `user` AS `u`
ON p.`user_id`=u.`user_id` 
";
//we can use different possible joins in place of right
$result=$db->query($sql);
if(!$result){
    exit("invalid sql statement");
}
while($array=$result->fetch_array()){
    echo $array['user_name']." ".$array['picture_id']."<br />";
}
?>