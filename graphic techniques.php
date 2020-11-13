<?php
$image=imagecreatetruecolor(500,500) or die("canvas cannot be created"); //This built in function is used to create a blank canvas with specific width and height

$red=imagecolorallocate($image,255,0,0);//RGB for red

$green=imagecolorallocate($image,0,255,0);//RGB for green

$blue=imagecolorallocate($image,0,0,255);//RGB for blue

$white=imagecolorallocate($image,255,255,255);//RGB for white

$black=imagecolorallocate($image,0,0,0);//RGB for black

$background=imagefill($image,0,0,$red); //This is used to fill the backround with some color

imagesetpixel($image,250,250,$white);//This is used to set a pixel on canvas

imageline($image,250,400,300,100,$blue);//This is used to draw a line on canvas

imagerectangle($image,300,200,150,400,$green);//This is used to draw a rectangle on canvas

//captcha verification

imagettftext($image,50,10,200,200,$white,'c:\users\pothu\appdata\local\microsoft\windows\fonts\matt font.ttf','KESPERESK');//function to print ttf extension font files


header('content-type:image/jpeg');//This is useful when you want to output some canvas

imagejpeg($image);//This is the method to output canvas on host

//croping a particular picture

$original=imagecreatefromjpeg("./2020/11/11/16051127055566.jpg");//Drags image from location

$original_width=imagesx($original);//yields width of image

$original_height=imagesy($original);//Yields height of image

$width=$original_width/2;

$height=$original_height/2;

$new_canvas=imagecreatetruecolor($height,$width);

imagecopy($new_canvas,$original,0,0,0,0,$height,$width);//creates a copy of image with conditions and the 4 o arguements are positions of original and destination


imagejpeg($new_canvas,"./2020/11/11/cropped.jpg");//output to destination




?>