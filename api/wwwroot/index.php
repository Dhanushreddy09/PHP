<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');
$db=mysqli_connect("localhost","root","","weather");
if(!$db){
	die("failed to connect to database".mysqli_connect_error());
}
$recieved_data=json_decode(file_get_contents("php://input"),true);
if($recieved_data["action"]=='average'){
    $cityid=$recieved_data["params"]["id"];
    $rating=$recieved_data["params"]["stars"];
    $sql="INSERT INTO `rating` SET `city id`='{$cityid}',`rating`='{$rating}'";
    $result=$db->query($sql);
    if(!$result){
        die("invalid query");
    }
    $sql="SELECT avg(`rating`) FROM `rating` WHERE `city id`='{$cityid}'";
    $result=$db->query($sql);
    if(!$result){
        die("query is invalid");
    }
    $array=$result->fetch_array();
    echo $array['avg(`rating`)'];
}
?>
