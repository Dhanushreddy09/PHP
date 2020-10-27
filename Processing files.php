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
	 if($_FILES['upload']['error']==1||$_FILES['upload']['error']==2){
		 echo "File size limit exceeded";
	 }
	 else{
		 echo "File is partially uploaded";
	 }
}
	}
?>