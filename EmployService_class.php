<?php
    
    class EmployService
	{    
		function getPageInfo($pagecut)
		{
		    $sql1 = "select count(id) from employ";		
			$sql2 = "select id, name, grade, salary, email from employ limit "
			    .(($pagecut->getPage_now()-1)*($pagecut->getPage_size())).", ".$pagecut->getPage_size(); 
			$pagecut->getPageInfo($sql1, $sql2, $pagecut);
			/*$db = new db_class();
			$db->sql_page_info($sql1, $sql2, $pagecut);	*/
		}
        function delEmpById ($id)
        {
		    require ('db_class.php');
			$sql = "delete from employ where id = $id";
		    $db = new db_class();
			$flag=$db->sql_manage($sql);
			$db->sql_close();            		
            return $flag;		

        }
		
		function addEmp($name,$pwd,$grade,$salary,$email)
		{
		    require ('db_class.php');	    
			$sql = "insert into employ (name,pwd,grade,salary,email) values ('$name','md5($pwd)','$grade','$salary','$email')";
			$db = new db_class();
			$flag = $db->sql_manage($sql);
			
			$db->sql_close();
			return $flag;		
		}
		
		function updateEmpById($id,$name,$pwd,$grade,$salary,$email)
		{
		    require_once ('db_class.php');
			$sql = "update employ set name='$name', pwd='$pwd', grade='$grade', salary='$salary',email='$email' where id='$id' ";
		    $db = new db_class();
			$flag = $db->sql_manage($sql);
			
			
			$db->sql_close();
			return $flag;
		}
		function queryEmpById($id)
	    {
		    require_once ('db_class.php');
	        $sql = "select * from employ where id = $id";
			$db = new db_class();
			$arr = $db->sql_query($sql);			
			$db->sql_close();
			return $arr;	
	    }
		function queryEmpByName($name)
	    {
		    require_once ('db_class.php');
	        $sql = "select id,name,grade,salary,email from employ where name= '$name' ";
			
			$db = new db_class();
			$arr = $db->sql_query($sql);			
			$db->sql_close();
			
			return $arr;
          			
	    }
		function queryEmpByChar($name)
	    {
		    require_once ('db_class.php');
	        $sql = "select id,name,grade,salary,email from employ where name like '%$name%' ";			
			$db = new db_class();
			$arr = $db->sql_query($sql);			
			$db->sql_close();
			var_dump($arr);
			return $arr;
          			
	    }
		
	}
?>