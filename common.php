<?php
    
    function showVisitedTime()
	{	    
	    if (empty($_COOKIE[LastVisited]))
            echo "The first time login time  <br/>";
		else 
		    echo "The last visited time is: ".$_COOKIE[LastVisited]."<br/>";
		setcookie("LastVisited",Date("Y:m:d  H:i:s"),time()+3600);
	}
	function getValFromCookie($key)
	{
	    if (!empty($_COOKIE[$key]))
		    echo $_COOKIE[$key];
		else
		    echo "";       			
	}
	function checkUserValidate()
	{
	    session_start();		
	    if (empty($_SESSION[uname]))
	        header("Location: login.php?errno=2");
	}
    //echo getValFromCookie(uname);
	//echo getValFromCookie(pwd);
	function checkCode()
	{
	    header("Content-Type: image/png");
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
		
        imagepng($im);
        imagedestroy($im);		
		
	}
	//checkCode();

?>