<?php  
    session_start();
	require_once ('AdminService_class.php');
    $uname = $_POST['uname'];
	$pwd = $_POST['pwd'];
    $checkCode = $_POST['checkCode'];	
	
	
	if (!empty($_POST[cookie]))
	{	    
	    setcookie("uname",$uname,time()+3600);
	    setcookie("pwd",$pwd,time()+3600);		
	}
	else
	{
	    if (!empty($_POST[uname]))
		    setcookie("uname","",time()-3600);
		if (!empty($_POST[pwd]))
		    setcookie("pwd","",time()-3600);
	}
	
	if ($checkCode != $_SESSION['checkCode'])
	{
		header("Location: login.php?errno=3 ");	
        exit();	
	
	}
	
	
	
	$admin= new AdminService();
	$flag = $admin->check_uname($uname, $pwd);	
	
	if ($flag)
	{
	    session_start();
	    $_SESSION[uname]="$uname";
	    header("Location: main.php?uname=$uname ");
		exit();
	}
	else 
	{
	   	header("Location: login.php?errno=1 ");	
        exit();		
	}
?>
