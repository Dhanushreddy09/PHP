<?php
require_once("./connection.php");
$n=2;
$sql="SELECT count(*) FROM `picture`";
$result=$db->query($sql);
if(!$result){
	exit("sql error");
}
$array=$result->fetch_array();
$result->free();
$rows=$array['count(*)'];
$buttons=ceil($rows/$n);
for($i=1;$i<=$buttons;$i++){
	echo "<a href='./pagination.php?current_page={$i}'> ".$i."</a>";
}
echo "<br />";
if(empty($_GET['current_page'])){
	$page=1;
}
else{
	if($_GET['current_page']>0 &&$_GET['current_page']<=$rows){
		$page=(int)$_GET['current_page'];
	}
	else{
		exit("invalid address");
	}
	
}
$m=($page-1)*$n;
$sql="SELECT * FROM `picture` LIMIT $m,$n";
$result=$db->query($sql);
if(!$result){
	exit("sql error");
	
}
while($array=$result->fetch_array()){
	echo $array['picture_id']." and ".$array['user_id']."<br/>";
}
$result->free();
$db->close();

?>