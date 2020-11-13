<?php

$image=imagecreatetruecolor(100,40) or die("unable to create canvas");

$red=imagecolorallocate($image,255,0,0);//RGB for red

$green=imagecolorallocate($image,0,255,0);//RGB for green

$blue=imagecolorallocate($image,0,0,255);//RGB for blue

$white=imagecolorallocate($image,255,255,255);//RGB for white

$black=imagecolorallocate($image,0,0,0);//RGB for black

$background=imagefill($image,0,0,$white); //This is used to fill the backround with some color

imagerectangle($image,1,1,98,38,$black);
$colors=array($blue,$black,$red);

for($i=1;$i<=500;$i++){
imagesetpixel($image,mt_rand(2,97),mt_rand(2,38),$colors[mt_rand(0,2)]);
}
$source="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$first=$source[mt_rand(0,61)];
$second=$source[mt_rand(0,61)];
$third=$source[mt_rand(0,61)];
$fourth=$source[mt_rand(0,61)];
$vcode=$first.$second.$third.$fourth;
setcookie("captcha",$vcode,0,"/");
imagettftext($image,20,mt_rand(-20,20),10,30,$colors[mt_rand(0,2)],'c:\users\pothu\appdata\local\microsoft\windows\fonts\matt font.ttf',$first);
imagettftext($image,20,mt_rand(-20,20),30,30,$colors[mt_rand(0,2)],'c:\windows\fonts\arial.ttf',$second);
imagettftext($image,20,mt_rand(-20,20),50,30,$colors[mt_rand(0,2)],'c:\windows\fonts\consola.ttf',$third);
imagettftext($image,20,mt_rand(-20,20),70,30,$colors[mt_rand(0,2)],'c:\windows\fonts\inkfree.ttf',$fourth);
header("content-type:image/png");
imagepng($image);

?>