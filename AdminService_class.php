<?php
    
    class AdminService 
    { 	
	    function check_uname($uname, $pwd)
		{
		    require('db_class.php');
			
			$sql = "select pwd from admin where name = '$uname'";
			$db = new db_class();
	        $arr = $db->sql_query($sql);
	        $db->sql_close();
			$flag = false;
						
			if (md5($pwd) == $arr[0][0])
	        { 
		        $flag = true;               				
	        }
            return $flag;
		}
	}
?>