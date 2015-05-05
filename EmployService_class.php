<?php
    require('db_class.php');
    class EmployService
	{    
		function getPageInfo($pagecut)
		{
		    $sql1 = "select count(id) from employ";		
			$sql2 = "select id, name, grade, salary, email from employ limit "
			    .(($pagecut->getPage_now()-1)*($pagecut->getPage_size())).", ".$pagecut->getPage_size(); 
			$db = new db_class();
			$db->sql_page_info($sql1, $sql2, $pagecut);	
		}		
		
	}
	/*$test = new EmployService();
	$num= $test->getPage_count(10);
	echo  $num;*/
?>