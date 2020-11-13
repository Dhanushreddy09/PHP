<?php

if(!empty($_POST['submit'])){
$result=strcasecmp($_COOKIE['captcha'],$_POST['vcode']);
if($result===0){
	echo"successful";
}
else{
	echo "incorrect captcha";
}
}
?>
<img  src="./captcha.php" /><br />
<form action="" method="POST">
<br/><br/>
Enter Captcha:<input type="text" name="vcode" value="" /> <input type="submit" name="submit" value="submit"/>
</form>