<?php
   
	$str = "";
    for ($i = 0; $i <4; $i++)
    {
	    $str.=dechex(rand(0,15));			
	}
		
	session_start();
	$_SESSION[checkCode] = $str;
		
	$im = imagecreatetruecolor(110,30);
	for ($i = 0;$i <15; $i++)
	{
        $color = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
        imageline($im, rand(0,110),rand(0,30),rand(0,110),rand(0,30),$color);
    }
    $text_color = imagecolorallocate($im,255,255,255);
	imagestring($im, rand(1,5), rand(0,80), rand(0,20), $str, $text_color);
	 header("Content-Type: image/png");	
    imagepng($im);
    imagedestroy($im);
?>