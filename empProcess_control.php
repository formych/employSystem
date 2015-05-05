<?php 
    require_once('EmployService_class.php');
	
	$type = $_REQUEST['type'];	
	if ($type == addEmp)
	{
		$name = $_POST['name'];
	    $pwd = $_POST['pwd'];
	    $grade = $_POST['grade'];
		$salary = $_POST['salary'];
		$email = $_POST['email'];
		$empSer = new EmployService();
	    $flag = $empSer->addEmp($name,$pwd,$grade,$salary,$email);		
		if ($flag ==1)
		{
			header("Location: process_succeed.php?info=Add");	
		}
		else
		{
			header("Location: process_failed.php?info=Add");
		}
	}	
	else if ($type == delEmp)
	{
		$empSer = new EmployService();
	    $flag = $empSer->delEmpById($_GET[id]);
		
        if ($flag ==1)
		{
			header("Location: process_succeed.php?info=Now  id ".$_GET[id] ."  has been deleted");	
		}
		else
		{
			header("Location: process_failed.php?info=Now  id ".$_GET[id] ."  hasn't been deleted");
		}	
	}
	else if ($type == updateEmp)
	{
	    $name = $_POST['name'];
	    $pwd = $_POST['pwd'];
	    $grade = $_POST['grade'];
		$salary = $_POST['salary'];
		$email = $_POST['email'];
		$id = $_POST['id'];
		
	
	    $empSer = new EmployService();
	    $flag = $empSer->updateEmpById($id,$name,$pwd,$grade,$salary,$email);
		
        if ($flag ==1)
		{
			header("Location: process_succeed.php?info=Now  id ".$_GET[id] ."  has been updated");	
		}
		else
		{
			header("Location: process_failed.php?info=Now  id ".$_GET[id] ."  hasn't been updated");    
	    }
	}
	
?>