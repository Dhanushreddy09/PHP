<?php
if(!empty($_GET['pic_name'])){
	$acceptable_range=array(
	"Dp.jpg",
	//"dev ops tools.PNG"
	);
	$result=in_array($_GET['pic_name'],$acceptable_range,true);
	if(!$result){
		exit("This file is prohibited from downloading and hence you cannot");
	}
	$file = './Download/'.$_GET['pic_name'];
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
}
?>
<a href="Downloading files.php?pic_name=dev ops tools.PNG"><img src="./Download/dev ops tools.PNG"/></a>