<?php  
    
	require_once ('AdminService_class.php');
    $uname = $_POST['uname'];
	$pwd = $_POST['pwd'];
	
	$admin= new AdminService();
	$flag = $admin->check_uname($uname, $pwd);	
	
	if ($flag)
	{
	    header("Location: main.php?uname=$uname ");
		exit();
	}
	else 
	{
	   	header("Location: login.php?error=false ");	
        exit();		
	}
?>
