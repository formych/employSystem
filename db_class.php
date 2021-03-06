<?php
     
	class db_class
	{
	    private static $host = "localhost";
		private static $user = "root";
		private static $pwd = "root";
		private static $db = "employ_system";		
    
		function __construct()
		{
            $this->mysqli = new mysqli(self::$host,self::$user,self::$pwd,self::$db);
	        if ($this->mysqli->connection_error)
	        {
	            echo "Connect to db failed";
	        }
			$this->mysqli->query("set names utf8");
	    }
		
		function sql_query($sql)
		{
		    $arr = array();
			$result = $this->mysqli->query($sql) or die($this->mysqli->error);
			while ($row = $result->fetch_row())
			    $arr[] = $row; 
				
			$result->free();
			return $arr;			
		}
		
		function sql_manage($sql)
		{
		    $result = $this->mysqli->query($sql) or die($this->mysqli->error);
			if(!$result)
			    return 0;
			else if($this->mysqli->affected_rows > 0)
			    return 1;
			else 
			    return -1;
		
		}
		
		function sql_page_info($sql1, $sql2, $pagecut)
		{		    
		    $row_count = $this->sql_query($sql1) or die($this->mysqli->error);
            $result_arr = $this->sql_query($sql2) or die($this->mysqli->error);	
			
            $pagecut->setRow_count($row_count[0][0]); 
  		    $pagecut->setPage_count(ceil($pagecut->getRow_count() / $pagecut->getPage_size()));			
			
			$pagecut->setArr($result_arr);			
           
		}
		
		function sql_close()
		{
		    if (!empty($this->mysqli))
			$this->mysqli->close();
		}		
	}	
?>