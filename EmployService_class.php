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
        function delById ($id)
        {
		    //require ('db_class');
			$sql = "delete from employ where id = $id";
		    $db = new db_class();
			$flag=$db->sql_manage($sql);
			$db->sql_close();
            			
            return $flag;		

        }
	}
?>