<!--
    Version 0:simple query page 
	Version 1:add user information
-->
<html>
    <head>
	    <meta http-equiv = "Content-Type" type = "text/html" charset = "utf-8"/>
	    <link rel = "stylesheet" type = "text/css" href = "css/query.css" />
	    <title> QueryPage </title>
	</head>
	<body>
	    <div>
		    <a href = "main.php">Back to MainPage</a>
			<a href = "login.php">Logout</a>
            User:<?php echo $_GET['uname']; ?>		
		</div>
		<div>
		    <form action = "query.php" method = "post">
		        <h2>QueryUser</h2>
			    Input user name:<input type = "text" name ="query" /> <input type = "submit" value = "search"/><br/>
				<input type = "radio" name ="module" value = "0" checked />Indistinct search   <input type = "radio" name ="module" value = "1"/> Accurate search
			</form>		
		</div>
		<div>
		    <table border = 1>
			<tr>
			<td>user id</td><td>user name</td><td>user grade</td><td>user salary</td><td>user email</td><td>update user</td><td>delete user</td>
			</tr>			
			<?php
			    require('db_class.php') ;
				if ($_POST[module] == 0)
				    $sql = "select * from employ where name like '%$_POST[query]%'";
				else 
				    $sql = "select * from employ where name = '$_POST[query]'";
				$db = new db_class();
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
	
      <?php