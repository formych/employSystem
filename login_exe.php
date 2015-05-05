<?php  
	/*
    Version 0:simple process 
	Version 1:use simplified module
    */
    require('db_class.php');
    $uname = $_POST['uname'];
	$pwd = $_POST['pwd'];	
	$sql = "select pwd from admin where name = '$uname'";
	
	$db = new db_class();
	$result = $db->sql_query($sql);
	$row = $result->fetch_row();
	$db->sql_close_result();
	$db->sql_close_connection();
	
	$flag = false;
	
	if (md5($pwd) == $row[0])
	{ 
		$flag = true;
	}
   
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
