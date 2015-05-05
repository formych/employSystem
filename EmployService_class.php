<?php
    require('db_class.php');
    class EmployService
	{
	    
	    function getPage_count($page_size)
        {		    
			$sql = "select count(id) from employ";
			$db = new db_class();
			$arr = $db->sql_query($sql);
			$db->sql_close();
			$row_count = $arr[0][0];
            $page_count = ceil($row_count/$page_size);
            return $page_count;
        }
		function getEmpListBypage($page_now, $page_size)
		{
		    $sql = "select id,name,grade,salary,email from employ limit ".($page_now-1)*$page_size.", ".$page_size ;
			$db = new db_class();
			$arr = $db->sql_query($sql);
			$db->sql_close();
            return $arr;			
		}
		
	
	}
	/*$test = new EmployService();
	$num= $test->getPage_count(10);
	echo  $num;*/
    
	
?>