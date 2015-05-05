<?php
    require('db_class.php');
    class PageCut
	{
	    private $page_count;
	    private $page_size;
	    private $page_now;
	    private $row_count;	
        private $arr;
        private	$navigate;
        private $gotoUrl;		
		
		function getPage_count()
		{
		    return $this->page_count;		
		}
		function setPage_count($page_count)
		{
		    $this->page_count = $page_count;
		}
		
		function getPage_size()
		{
		    return $this->page_size;		
		}
		function setPage_size($page_size)
		{
		    $this->page_size = $page_size;
		}
		
		function getPage_now()
		{
		    return $this->page_now;		
		}
		function setPage_now($page_now)
		{
		    $this->page_now = $page_now;
		}
		
		function getRow_count()
		{
		    return $this->row_count;		
		}
		function setRow_count($row_count)
		{
		    $this->row_count = $row_count;
		}

        function getArr()
		{
		    return $this->arr;		
		}
		function setArr($arr)
		{
		    $this->arr = $arr;
		}

        function getNavigate()
		{
		    return $this->navigate;		
		}
		function setNavigate($navigate)
		{
		    $this->navigate = $navigate;
		}
		
		function getGotoUrl()
		{
		    return $this->gotoUrl;		
		}
		function setGotoUrl($gotoUrl)
		{
		    $this->gotoUrl = $gotoUrl;
		}
		
		function getPageInfo($sql1, $sql2, $pagecut)
		{   			
		    $db = new db_class() or die (mysql_error());
			$db->sql_page_info($sql1, $sql2, $pagecut);
            $db->sql_close();			
		}
		
		function setPageInfo ($page_size, $page_id,$pagecut,$empSer)
		{
		    if(!empty($page_size))
			{
				$pagecut->setPage_size($_GET[page_size]);				
			}				
				
            $empSer->getPageInfo($pagecut);		
               					
			if (!empty($page_id))
 			{
				if ($page_id <= $pagecut->getPage_count())
				    $pagecut->setPage_now($page_id);
				else
					$pagecut->setPage_now($pagecut->getPage_count());
				$empSer->getPageInfo($pagecut);	
             				
			}
		
		}



        function navigateInfo($pagecut)
		{
		    //这里使用了2种方法来实现导航条
			//1.使用echo
			//2.使用$pagecut->setNavigate($string) 添加到$navigate属性上
		    $page_whole = 10;
			$start = floor(($pagecut->getPage_now() - 1)/$page_whole) * $page_whole + 1;
            $end = $start + $page_whole;
			if ($end > $pagecut->getPage_count())
			    $end = $pagecut->getPage_count() + 1;			

            if ($start > $page_whole)
                echo "<a href = {$pagecut->getGotoUrl()}?page_id=".($pagecut->getPage_now()-$page_whole).
				     "&&page_size=".$pagecut->getPage_size()." ><<<</a>&nbsp;";			
		    
			for ($i = $start; $i < $end; $i++)
			    echo "<a href = {$pagecut->getGotoUrl()}?page_id=$i&&page_size="
				     .$pagecut->getPage_size()." >[$i]</a>&nbsp;";
				
			if($end <= $pagecut->getPage_count())
			    echo "<a href = {$pagecut->getGotoUrl()}?page_id=".($pagecut->getPage_now()+$page_whole).
				     "&&page_size=".$pagecut->getPage_size()." >>>></a>&nbsp;";	
			
			
		    
		    if ($pagecut->getPage_now() > 1)
			{		
			    $previous_page = $pagecut->getPage_now() - 1; 			
				$pagecut->setNavigate($pagecut->getNavigate().
				    "<a href = {$pagecut->getGotoUrl()}?page_id=$previous_page&&page_size="
				    .$pagecut->getPage_size(). ">pre</a>&nbsp;");
			}
            if ($pagecut->getPage_now() < $pagecut->getPage_count())	
            {
			    $next_page = $pagecut->getPage_now() + 1;  
                $pagecut->setNavigate($pagecut->getNavigate().
				    "<a href = {$pagecut->getGotoUrl()}?page_id=$next_page&&page_size="
				    .$pagecut->getPage_size()." >next</a>&nbsp;");			
            }
			
			$pagecut->setNavigate($pagecut->getNavigate().
			    "<<<a href = {$pagecut->getGotoUrl()}?page_size=1 >1</a>&nbsp");
			$pagecut->setNavigate($pagecut->getNavigate().
			    "<a href = {$pagecut->getGotoUrl()}?page_size=5 >5</a>&nbsp");
			$pagecut->setNavigate($pagecut->getNavigate().
			    "<a href = {$pagecut->getGotoUrl()}?page_size=10 >10</a>&nbsp");
			$pagecut->setNavigate($pagecut->getNavigate().
			    "<a href = {$pagecut->getGotoUrl()}?page_size=20 >20</a>&nbsp");
			$pagecut->setNavigate($pagecut->getNavigate().
			    "<a href = {$pagecut->getGotoUrl()}?page_size=25 >25</a>>>&nbsp");
            
            $pagecut->setNavigate($pagecut->getNavigate().
				"<a href = {$pagecut->getGotoUrl()}?page_id=1&&page_size="
				.$pagecut->getPage_size()." >Start</a>&nbsp;");			
            $pagecut->setNavigate($pagecut->getNavigate().
				"<a href = {$pagecut->getGotoUrl()}?page_id=".$pagecut->getPage_count()
				."&&page_size=".$pagecut->getPage_size()." >End</a>&nbsp;");				
		    
			
			$pagecut->setNavigate($pagecut->getNavigate().
            	"Pages:".$pagecut->getPage_now()."/".$pagecut->getPage_count()."&nbsp");
		}		
	
	}
	/*$test = new PageCut();
	$test->setRow_count('456');
	echo "123<br/>".$test->getRow_count();
	*/
	


?>