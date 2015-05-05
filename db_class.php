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
		    $this->result = $this->mysqli->query($sql) or die($this->mysqli->error);
			return $this->result;			
		}
		
		function sql_manage($sql)
		{
		    $this->result = $this->mysqli->query($sql) or die($this->mysqli->error);
			if(!$this->result)
			    return 0;
			else if($this->mysqli->affected_nums > 0)
			    return 1;
			else 
			    return -1;
		
		}
		function sql_close_result()
		{
		    $this->result->free();
		}
		function sql_close_connection()
		{
		    $this->mysqli->close();
		}		
	}	
?>