<?php
if(isset($_COOKIE['id'])&&isset($_COOKIE['security'])){
	setcookie("id","",time()-1,"/");
	setcookie("security","",time()-1,"/");
	echo "bye <a href='./log in.php'>log in</a>";
}
else{
	exit("illegal operation <a href='./log in.php'>log in</a>");
}
?>