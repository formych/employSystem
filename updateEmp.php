<html>
    <head>
	    <meta http-equiv="Conten-Type" type="text/html" charset="utf-8" />
		<title> updateEmp</title>
	</head>
	<body>
	    <?php
		    require_once('EmployService_class.php');
			$empSer = new EmployService();
			$arr = $empSer->queryEmpById($_GET[id]);		
		?>
	    <h2>UpdateEmp</h2>
		<form action="empProcess_control.php" method="post">
		<table>
		    <tr><td>Name</td>
			    <td><input type="text" name="id" readonly value="<?php echo $arr[0][0] ?>"></td></tr>
		    <tr><td>Name</td>
			    <td><input type="text" name="name"  value="<?php echo $arr[0][1] ?>"></td></tr>
			<tr><td>Pwd</td>
			    <td><input type="text" name="pwd"   value="<?php echo $arr[0][2] ?>"></td></tr>
			<tr><td>Grade</td>
			    <td><input type="text" name="grade" value="<?php echo $arr[0][3] ?>"></td></tr>
			<tr><td>Salary</td>
			    <td><input type="text" name="salary" value="<?php echo $arr[0][4] ?>"></td></tr>
			<tr><td>Email</td>
			    <td><input type="text" name="email" value="<?php echo $arr[0][5] ?>"></td></tr>
			<tr><td><input type="submit" name="submit"> 
			        <input type="hidden" name="type" value="updateEmp"></td>
			    <td><input type="reset" name="reset"></td></tr>
			
		</table>
		</form>
	
	
	
	</body>
</html>