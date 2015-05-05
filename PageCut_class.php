<?php
    class PageCut
	{
	    private $page_count;
	    private $page_size;
	    private $page_now;
	    private $row_count;	
        private $arr;
        private	$navigate;	
		
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
		
		/*function getPageInfo($sql1, $sql2, $pagecut)
		{   
		    require('db_class.php');			
		    $db = new db_class();
			$db->sql_page_info($sql1, $sql2, $pagecut);	
		}*/
		
		function setPageInfo ($num, $id,$pagecut,$empSer)
		{
		    if(!empty($num))
			{
				$pagecut->setPage_size($_GET[num]);				
			}				
				
            $empSer->getPageInfo($pagecut);		
               					
			if (!empty($id))
 			{
				if ($id <= $pagecut->getPage_count())
				    $pagecut->setPage_now($id);
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
                echo "<a href = manage.php?id=".($pagecut->getPage_now()-$page_whole).
				     "&&num=".$pagecut->getPage_size()." ><<<</a>&nbsp;";			
		    
			for ($i = $start; $i < $end; $i++)
			    echo "<a href = manage.php?id=$i&&num="
				     .$pagecut->getPage_size()." >[$i]</a>&nbsp;";
				
			if($end <= $pagecut->getPage_count())
			    echo "<a href = manage.php?id=".($pagecut->getPage_now()+$page_whole).
				     "&&num=".$pagecut->getPage_size()." >>>></a>&nbsp;";	
			
			
		    
		    if ($pagecut->getPage_now() > 1)
			{		
			    $previous_page = $pagecut->getPage_now() - 1; 			
				$pagecut->setNavigate($pagecut->getNavigate().
				    "<a href = manage.php?id=$previous_page&&num="
				    .$pagecut->getPage_size(). ">pre</a>&nbsp;");
			}
            if ($pagecut->getPage_now() < $pagecut->getPage_count())	
            {
			    $next_page = $pagecut->getPage_now() + 1;  
                $pagecut->setNavigate($pagecut->getNavigate().
				    "<a href = manage.php?id=$next_page&&num="
				    .$pagecut->getPage_size()." >next</a>&nbsp;");			
            }
			
			$pagecut->setNavigate($pagecut->getNavigate().
			    "<<<a href = manage.php?num=1 >1</a>&nbsp");
			$pagecut->setNavigate($pagecut->getNavigate().
			    "<a href = manage.php?num=5 >5</a>&nbsp");
			$pagecut->setNavigate($pagecut->getNavigate().
			    "<a href = manage.php?num=10 >10</a>&nbsp");
			$pagecut->setNavigate($pagecut->getNavigate().
			    "<a href = manage.php?num=20 >20</a>&nbsp");
			$pagecut->setNavigate($pagecut->getNavigate().
			    "<a href = manage.php?num=25 >25</a>>>&nbsp");
            
            $pagecut->setNavigate($pagecut->getNavigate().
				"<a href = manage.php?id=1&&num="
				.$pagecut->getPage_size()." >Start</a>&nbsp;");			
            $pagecut->setNavigate($pagecut->getNavigate().
				"<a href = manage.php?id=".$pagecut->getPage_count()
				."&&num=".$pagecut->getPage_size()." >End</a>&nbsp;");				
		    
			
			$pagecut->setNavigate($pagecut->getNavigate().
            	"Pages:".$pagecut->getPage_now()."/".$pagecut->getPage_count()."&nbsp");
		}		
	
	}
	/*$test = new PageCut();
	$test->setRow_count('456');
	echo "123<br/>".$test->getRow_count();
	*/
	


?>