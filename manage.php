<?php
    require_once('common.php');
    checkUserValidate();
?>
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
		<table border=1 cellspacing = "0" bordercolor ="blue">
		    <tr>
		    <td>user id</td><td>user name</td><td>user grade</td><td>user salary</td>
			<td>user email</td><td>update user</td><td>delete user</td>
		    </tr>
			<?php
			    require_once('EmployService_class.php');
                require_once('PageCut_class.php');	               
                
				$empSer = new EmployService();
				$pagecut = new PageCut();
				
                					
				$pagecut->setPage_size(6);			    
				$pagecut->setPage_now(1);
				$pagecut->setGotoUrl('manage.php');               		
				
			    $pagecut->setPageInfo($_GET[page_size], $_GET[page_id], $pagecut, $empSer);				
				
				$arr = $pagecut->getArr();
                			
			    for ($i = 0 ;$i<count($arr);$i++)
				{				    
                    $row = $arr[$i];					
			        echo "<tr>";
				    for($j = 0; $j < count($row); $j++)
				        echo "<td>$row[$j]</td>";
						echo $row[0];
					echo "<td><a href = updateEmp.php?id=$row[0]&&type=updateEmp>update user</a></td>
					      <td><a href = empProcess_control.php?id=$row[0]&&type=delEmp >delete user</a></td>";
					echo "</tr>";
				}		        
			?>
		</table>
		</div>
		<div>
		<?php			
			$pagecut->navigateInfo($pagecut);
			echo $pagecut->getNavigate();		
		?>
		</div>
		<div>
		    <form action = "manage.php" method = "get">
		    Jump to: <input type = "text" name = "page_id"  /> 
			<input type = "hidden" name= "page_size" value = "<?php echo $pagecut->getPage_size() ?>" /> 
			<input type = "submit" value = "Go"/> <br/>
		    </form>
		</div>	      
	</body>
</html>