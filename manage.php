<html>
    <head>
	    <meta http-equiv="Content-Type" type="text/html" charset="utf-8" /> 		
		<link rel = "stylesheet" type = "text/css" href = "css/query.css" />
		<title>Manage Page </title>
	</head>
	<body>
	    <div>
		    <a href = "main.php">Back to MainPage</a>
			<a href = "login.php">Logout</a>
            User:<?php echo $_GET['uname']; ?>		
		</div>
		<h2>ManageUser</h2>
		<div>
		<table border=1>
		    <tr>
		    <td>user id</td><td>user name</td><td>user grade</td><td>user salary</td><td>user email</td><td>update user</td><td>delete user</td>
		    </tr>
			<?php
			    require('db_class.php') ;
				$sql_count = "select count(id) from employ";
				$db = new db_class();
				$result_count = $db->sql_query($sql_count) or die (mysql_error());
				if ($row = $result_count->fetch_row())
				{
				    $row_count = $row[0];
				}			
			    $page_size = 6;
				$page_now = 1;
				if(!empty($_GET[num]))
				{
				    $page_size = $_GET[num];				
				}				
				$page_count = ceil($row_count / $page_size);
				
				if (!empty($_GET[id]))
 				{
				    if ($_GET[id] <= $page_count)
				        $page_now = $_GET[id];
					else
					    $page_now = $page_count;
				}
				
				
				$sql = "select * from employ limit ".($page_now-1)*$page_size.", $page_size ";
				$result = $db->sql_query($sql);				
			    while ($row = $result->fetch_row())
				{		
			        echo "<tr>";
				    for($j = 0; $j < 5; $j++)
				        echo "<td>$row[$j]</td>";
					echo "<td><a href = '#'>update user</a></td><td><a href = '#'>delete user</a></td>";
					echo "</tr>";
				}	
		        $db->sql_close_result();
	            $db->sql_close_connection();
			?>
		</table>
		</div>
		<div>
		<?php		    
			//else 
			//    echo "&nbsp;&nbsp;&nbsp;&nbsp;";
			$start = $page_now ;		              
      		$end = $start + 9;
			if ($end > $page_count)
			{
			    $end = $page_count;
			}
            			
		    for ($i = $start; $i <= $end; $i++)
			    echo "<a href = manage.php?id=$i&&num=$page_size ><$i></a>&nbsp;";
			if ($page_now > 1)
			{		
			    $previous_page = $page_now - 1; 			
				echo "<a href = manage.php?id=$previous_page&&num=$page_size >pre</a>&nbsp;";
			}
            if ($page_now < $page_count)	
            {
                $next_page = $page_now + 1; 			
				echo "<a href = manage.php?id=$next_page&&num=$page_size >next</a>&nbsp;";
            }
			echo "<<<a href = manage.php?num=1 >1</a>&nbsp";
			echo "<a href = manage.php?num=3 >3</a>&nbsp";
			echo "<a href = manage.php?num=5 >5</a>&nbsp";
			echo "<a href = manage.php?num=8 >8</a>&nbsp";
			echo "<a href = manage.php?num=10 >10</a>>>&nbsp";
			
			echo "<a href = manage.php?id=1&&num=$page_size >HomePage</a>&nbsp;";
			echo "<a href = manage.php?id=$page_count&&num=$page_size >EndPage</a>&nbsp;";
			echo "Pages:".$page_now."/".$page_count."&nbsp";
			
		?>
		</div>
		<div>
		    <form action = "manage.php" method = "get">
		    Jump to: <input type = "text" name = "id"  /> 
			<input type = "hidden" name= "num" value = "<?php echo $page_size ?>" /> 
			<input type = "submit" value = "Go"/> <br/>
		    </form>
		</div>	      
	</body>
</html>