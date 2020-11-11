<?php
/*if(isset($_COOKIE['id'])&&isset($_COOKIE['security'])){
	$id=addslashes($_COOKIE['id']);
	require_once("./connection.php");
	$sql="SELECT* FROM `user` WHERE `user_id`='{$id}'";
	$result=$db->query($sql);
	if($db->error){
		exit("database error");
	}
	if($result->num_rows==0){
		exit("<script>window.location.href='./log in.php'</script>");
	}
	$array=$result->fetch_array();
	$result->free();
	$db->close();
	$shell=md5($array['user_id'].$array['password']."one_plus_one_is_three");
	if($shell==$_COOKIE['security']){
		echo "Welcome ".$array['user_name']."<br/>";
		echo "you can log out by clicking here <a href='./logout'>log out</a>";
	}
	else{
		exit("<script>window.location.href='./log in.php'</script>");
	}
}
else{
	exit("<script>window.location.href='./log in.php'</script>");
	}*/
if(empty($_COOKIE['switch'])){
	exit("Upload access denied");
}
if($_COOKIE['switch']=="on"){
	setcookie("switch","",time()-1,"/");
}
else{
	exit("upload access denied");
}
if(!empty($_POST['submit'])){
	if($_FILES['upload']['error']==0){
		switch($_FILES['upload']['type']){
			case"image/jpeg":
			echo "That was a valid file type <br />";
			break;
			default:
			exit("invalid file type");
		}
		$array=$_FILES['upload']['name'];
		$extension=explode(".",$array);
		$file_name_extension=array_pop($extension);
		$new_file_name=time().rand(1000,9999).".".$file_name_extension;
		$new_file_destination="./".date("Y")."/".date("m")."/".date("d");
		if(!is_dir($new_file_destination)){
		 mkdir($new_file_destination,0777,true);
		 $destination=$new_file_destination."/".$new_file_name;
		}else{
			// directory already exists
			$destination=$new_file_destination."/".$new_file_name;
		}
		if(move_uploaded_file($_FILES['upload']['tmp_name'],$destination)){
			require_once("./connection.php");
			$user_id=addslashes($_COOKIE['id']);
			$sql="INSERT INTO `picture` SET `url`='{$destination}',`user_id`='{$user_id}'";
			$db->query($sql);
			if($db->error){
				exit("sql error");
			}
			$db->close();
			echo "File succesfully uploaded <br />";
		}
		else{
			echo "unable to upload file <br />";
		}
	}
else{
	 if($_FILES['upload']['error']==1||$_FILES['upload']['error']==2){
		 echo "File size limit exceeded <br />";
	 }
	 else{
		 echo "File is partially uploaded <br />";
	 }
}
	}
?>