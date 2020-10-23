<?php
if(!empty($_POST['submit'])){
	if($_FILES['upload']['error']==0){
		if(move_uploaded_file($_FILES['upload']['tmp_name'],"./wampthemes/".$_FILES['upload']['name'])){
			echo "File succesfully uploaded";
		}
		else{
			echo "unable to upload file";
		}
	}
else{
	echo "Something is wrong";
}
	}
?>