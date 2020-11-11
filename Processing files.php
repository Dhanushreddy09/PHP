<?php
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