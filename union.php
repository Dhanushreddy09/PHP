<?php
$db=@new mysqli("localhost","volhard","Dhanush@123","membership");
if(!$db){
    exit("Connection error");
}
$sql="
SELECT `user_name`,`email` FROM `user` UNION
SELECT `picture_id`,`url` FROM `picture`
";
$result=$db->query($sql);
if(!$result){
    exit("help");
}
while($array=$result->fetch_array()){
    echo $array['user_name']." ".$array['email']."<br />";
}
?>